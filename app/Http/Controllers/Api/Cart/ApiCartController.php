<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 9:37 AM
 */
namespace App\Http\Controllers\Api\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\FishItem;
use App\Models\FishSizeCategory;
use App\Models\FishCategory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemLog;
use App\Models\OrderKind;
use App\Models\OrderStatus;
use App\Models\Period;
use App\Models\User;
use App\Classes\AdditionalFunctionClass;

class ApiCartController extends Controller
{

    /*
     * Action untuk proses login
     * Created by Budi Santoso
     * Params @username and @password
     */

    private $additionalFunction;

    public function __construct()
    {
        $this->additionalFunction = new AdditionalFunctionClass();
    }

    public function index()
    {
        return response()->json("Hallo");
    }

    public function addToCart(Request $request)
    {
        $apiName = "ADD_TO_CART";
        $userId = $request->input('user_id');
        $currentYear = $request->input('current_year');
        $orderKindId = $request->input('order_kind_id');

        $requestParams = [
            'user_id' => $userId,
            'current_year' => $currentYear,
            'order_kind_id' => $orderKindId
        ];

        if(is_null($userId)){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Missing required paramter user_id', json_encode($requestParams) );
        }

        if(is_null($currentYear)){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Missing required paramter current_year', json_encode($requestParams) );
        }

        if(is_null($orderKindId)){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Missing required paramter order_kind_id', json_encode($requestParams) );
        }

        $currentPeriod = Period::where(['period_name' => $currentYear])->first();
        if(is_null($currentPeriod)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'Period not found!', json_encode($requestParams) );
        }

        $currentUser = User::find($userId);
        if(is_null($currentUser)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'User not found!', json_encode($requestParams) );
        }

        $orderKind = OrderKind::find($orderKindId);
        if(is_null($orderKind)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'Order kind not found!', json_encode($requestParams) );
        }

        $currentOrder = Order::where(['order_users_id' => $userId, 'order_order_kinds_id' => $orderKindId, 'order_order_status_id' => 1])->first();
        if(is_null($currentOrder)){
            $currentOrder = new Order();
            $currentOrder->order_users_id = $userId;
            $currentOrder->order_periods_id = $currentPeriod->id;
            $currentOrder->order_order_kinds_id = $orderKindId;
            $currentOrder->order_created_at = date("Y-m-d H:i:s");
            $currentOrder->order_total = 0;
            $currentOrder->order_shipping_cost = 0;
            $currentOrder->order_order_status_id = 1; //order baru / berjalan
            $currentOrder->order_payment_types_id = 1;

            try{
                $currentOrder->save();
            }catch (\Exception $e){
                return $this->additionalFunction->returnApiMessage($apiName, 500, 'Order couldnot created!', json_encode($requestParams));
            }
        }



        /**
         * @proses untuk menambahkan ke keranjang
         **/
        $fishItemId = $request->input('fish_item_id');
        if(is_null($fishItemId)){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Missing required paramter fish_item_id', json_encode($requestParams) );
        }

        $requestParams["fish_item_id"] = $fishItemId;

        $fishItem = FishItem::find($fishItemId);
        if(is_null($fishItem)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'Fish item not found!', json_encode($requestParams) );
        }




        $orderItem = OrderItem::where(['orde_item_orders_id' => $currentOrder->id, 'fish_items_id' => $fishItemId])->first();
        if(is_null($orderItem)){

            if(($fishItem->fish_item_quantity - 1) < 0)
            {
                return $this->additionalFunction->returnApiMessage($apiName, 404, 'Fish item out of stock!', json_encode($requestParams) );
            }

            $orderItem = new OrderItem();
            $orderItem->order_item_quantity = 1;
            $orderItem->fish_items_id = $fishItemId;
            $orderItem->orde_item_orders_id = $currentOrder->id;
            try{
                $orderItem->save();
            }catch (\Exception $e){
                return $this->additionalFunction->returnApiMessage($apiName, 500, 'Order item couldnot created!', json_encode($requestParams));
            }

        }else{
            $orderItem->order_item_quantity += 1;

            if(($fishItem->fish_item_quantity - $orderItem->order_item_quantity) < 0)
            {
                return $this->additionalFunction->returnApiMessage($apiName, 404, 'Fish item out of stock!', json_encode($requestParams) );
            }

            try{
                $orderItem->save();
            }catch (\Exception $e){
                return $this->additionalFunction->returnApiMessage($apiName, 500, 'Order item couldnot added!', json_encode($requestParams));
            }
        }

        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Success adding fish item to cart!',
        ];


        return response()->json($params);
    }
    
    public function listProductInCart(Request $request, $user_id)
    {
        $apiName = "LIST_PRODUCT_IN_CART";
        $activeUser = User::find($user_id);
        $requestParams = [
            'user_id' => $user_id
        ];
        if(is_null($activeUser)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'User not found!', json_encode($requestParams));
        }

        $orders = Order::where(['order_users_id' => $user_id, 'order_order_status_id' => 1])->get();
        $data = [];
        foreach ($orders as $num => $item)
        {
            foreach ($item->getOrderItems as $no => $orderItem){
                $price = 0;
                if($item->order_order_kinds_id == 1){
                    /** per kilogram */
                    $price = intval($orderItem->getFishItem->fish_item_normal_price);

                }else{
                    /**  per ekor (100gram)**/
                    $price = intval($orderItem->getFishItem->fish_item_specific_price);

                }

                $data[] = [
                    'order_item_id' => $orderItem->id,
                    'fish_item_name' => $orderItem->getFishItem->fish_item_name,
                    'quantity' => $orderItem->order_item_quantity,
                    'price' => $price,
                    'order_kind' => "".$item->order_order_kinds_id,
                    'picture' => 'public/uploads/ikan/'.$orderItem->getFishItem->fish_item_picture,
                    'weight' => $orderItem->getFishItem->fish_item_weight
                ];
            }
        }

        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Success get product in cart!',
            'data' => $data
        ];


        return response()->json($params);

    }

    public function addQuantity(Request $request)
    {
        $apiName = "API_ADD_QUANTITY";
        $userId = $request->input('user_id');
        $orderItemId = $request->input('order_item_id');

        $requestParams = [
            'user_id' => $userId,
            'order_item_id' => $orderItemId
        ];

        if(is_null($userId)){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Missing required paramter user_id', json_encode($requestParams) );
        }

        if(is_null($orderItemId)){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Missing required paramter order_item_id', json_encode($requestParams) );
        }

        $activeUser = User::find($userId);
        if(is_null($activeUser)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'User not found!', json_encode($requestParams) );
        }

        $orderItem = OrderItem::find($orderItemId);
        if(is_null($orderItem)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'Order item not found!', json_encode($requestParams) );
        }

        $fishItem = FishItem::find($orderItem->fish_items_id);
        if(is_null($fishItem)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'Fish item not found!', json_encode($requestParams) );
        }

        try{
            $orderItem->order_item_quantity += 1;

            if(($fishItem->fish_item_quantity - $orderItem->order_item_quantity) < 0)
            {
                return $this->additionalFunction->returnApiMessage($apiName, 404, 'Fish item out of stock!', json_encode($requestParams) );
            }
            
            $orderItem->save();

            $orders = Order::where(['order_users_id' => $userId])->get();
            $data = [];
            foreach ($orders as $num => $item)
            {
                foreach ($item->getOrderItems as $no => $orderItem){
                    $price = 0;
                    if($item->order_order_kinds_id == 1){
                        /** per kilogram */
                        $price = intval($orderItem->getFishItem->fish_item_normal_price);

                    }else{
                        /**  per ekor (100gram)**/
                        $price = intval($orderItem->getFishItem->fish_item_specific_price);

                    }

                    $data[] = [
                        'order_item_id' => $orderItem->id,
                        'fish_item_name' => $orderItem->getFishItem->fish_item_name,
                        'quantity' => $orderItem->order_item_quantity,
                        'price' => $price,
                        'order_kind' => "".$item->order_order_kinds_id,
                        'picture' => 'public/uploads/ikan/'.$orderItem->getFishItem->fish_item_picture,
                        'weight' => $orderItem->getFishItem->fish_item_weight
                    ];
                }
            }

            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Success add quantity product in cart!',
                'data' => $data
            ];


            return response()->json($params);

        }catch (\Exception $e){
            return $this->additionalFunction->returnApiMessage($apiName, 500, 'Failed to add item quantity!', json_encode($requestParams) );
        }

    }

    public function reduceQuantity(Request $request)
    {
        $apiName = "API_REDUCE_QUANTITY";
        $userId = $request->input('user_id');
        $orderItemId = $request->input('order_item_id');

        $requestParams = [
            'user_id' => $userId,
            'order_item_id' => $orderItemId
        ];

        if(is_null($userId)){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Missing required paramter user_id', json_encode($requestParams) );
        }

        if(is_null($orderItemId)){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Missing required paramter order_item_id', json_encode($requestParams) );
        }

        $activeUser = User::find($userId);
        if(is_null($activeUser)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'User not found!', json_encode($requestParams) );
        }

        $orderItem = OrderItem::find($orderItemId);
        if(is_null($orderItem)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'Order item not found!', json_encode($requestParams) );
        }

        $fishItem = FishItem::find($orderItem->fish_items_id);
        if(is_null($fishItem)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'Fish item not found!', json_encode($requestParams) );
        }

        if( ($fishItem->fish_item_quantity - 1) < 0 ){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Fish item out of stock!', json_encode($requestParams) );
        }

        try{
            $orderItem->order_item_quantity -= 1;
            $orderItem->save();

            if($orderItem->order_item_quantity < 1){
                $orderItem->delete();
            }

            $orders = Order::where(['order_users_id' => $userId, 'order_order_status_id' => 1])->get();
            $data = [];
            foreach ($orders as $num => $item)
            {
                foreach ($item->getOrderItems as $no => $orderItem){
                    $price = 0;
                    if($item->order_order_kinds_id == 1){
                        /** per kilogram */
                        $price = intval($orderItem->getFishItem->fish_item_normal_price);

                    }else{
                        /**  per ekor (100gram)**/
                        $price = intval($orderItem->getFishItem->fish_item_specific_price);

                    }

                    $data[] = [
                        'order_item_id' => $orderItem->id,
                        'fish_item_name' => $orderItem->getFishItem->fish_item_name,
                        'quantity' => $orderItem->order_item_quantity,
                        'price' => $price,
                        'order_kind' => "".$item->order_order_kinds_id,
                        'picture' => 'public/uploads/ikan/'.$orderItem->getFishItem->fish_item_picture,
                        'weight' => $orderItem->getFishItem->fish_item_weight
                    ];
                }
            }

            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Success reduce quantity product in cart!',
                'data' => $data
            ];


            return response()->json($params);

        }catch (\Exception $e){
            return $this->additionalFunction->returnApiMessage($apiName, 500, 'Failed to add item quantity!', json_encode($requestParams) );
        }

    }


    public function normalizationCart($user_id)
    {
        $apiName = "API_NORMALIZE_CART";
        $requestParams = [
            'user_id' => $user_id
        ];
        if(is_null($user_id)){
            return $this->additionalFunction->returnApiMessage($apiName, 400, 'Missing required paramter user_id', json_encode($requestParams) );
        }

        $activeUser = User::find($user_id);
        if(is_null($activeUser)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, 'User not found!', json_encode($requestParams) );
        }

        $orders = Order::where(['order_users_id' => $user_id, 'order_order_status_id' => 1])->get();
        $data = [];
        foreach ($orders as $num => $order) {
            foreach ($order->getOrderItems as $no => $orderItem){
                $fishItem = FishItem::find($orderItem->fish_items_id);
                if($orderItem->order_item_quantity > $fishItem->fish_item_quantity)
                {
                    $orderItem->order_item_quantity = $fishItem->fish_item_quantity;
                    try{
                        $orderItem->save();
                    }catch (\Exception $e){
                        return $this->additionalFunction->returnApiMessage($apiName, 400, 'Failed to normalize cart!', json_encode($requestParams) );
                    }
                }

                if($order->order_order_kinds_id == 1){
                    /** per kilogram */
                    $price = intval($orderItem->getFishItem->fish_item_normal_price);

                }else{
                    /**  per ekor (100gram)**/
                    $price = intval($orderItem->getFishItem->fish_item_specific_price);

                }

                $data[] = [
                    'order_item_id' => $orderItem->id,
                    'fish_item_name' => $orderItem->getFishItem->fish_item_name,
                    'quantity' => $orderItem->order_item_quantity,
                    'price' => $price,
                    'order_kind' => "".$item->order_order_kinds_id,
                    'picture' => 'public/uploads/ikan/'.$orderItem->getFishItem->fish_item_picture,
                    'weight' => $orderItem->getFishItem->fish_item_weight
                ];

            }
        }

        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Success normalize product in cart!',
            'data' => $data
        ];


        return response()->json($params);

    }

}