<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 9:37 AM
 */
namespace App\Http\Controllers\Api;
use App\Models\Order;
use App\Models\OrderItem;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FishCategory;
use App\Models\Fish;
use App\Models\FishItem;
use App\Classes\AdditionalFunctionClass;

class ApiPembayaranController extends Controller
{
    private $additionalFunction;

    public function __construct()
    {
        $this->additionalFunction = new AdditionalFunctionClass();
    }

    public function uploadBuktiBayar(Request $request)
    {
        $apiName = "UPLOAD_BUKTI_BAYAR";
        $orderId = $request->input("order_id");

        $sendingParams = [
            'order_id' => $orderId
        ];

        if(is_null($orderId)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter order_id!", json_encode($sendingParams) );
        }

        $data = Order::find($orderId);

        $picture = $request->file('order_picture');
        if (isset($picture)) {
            $filename = date("YmdHis"). '-' . $picture->getClientOriginalName();
            if ($picture->move("public/uploads/receipt", $filename)) {
                $data->order_pay_receipt = $filename;
                $data->order_is_pay = 1;

            }
        }

        try{
            $data->save();
            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Upload success!',
            ];

            return response()->json($params);

        }catch (\Exception $e){
            return $this->additionalFunction->returnApiMessage($apiName, 500, "Failed to upload your receipt!", json_encode($sendingParams) );
        }
    }

    public function checkOut(Request $request)
    {
        $apiName = "CHECKOUT";
        $userId = $request->input('userid');
        $destinationAddress = $request->input('destination_address');
        $destinationName = $request->input('destination_name');
        $paymentType = $request->input('payment_type');
        $serviceCode = $request->input('service_code');
        $shipping = $request->input("shipping");

        $sendingParams = [
            'userid' => $userId,
            'destination_address' => $destinationAddress,
            'destination_name' => $destinationName,
            'payment_type' => $paymentType,
            'service_code' => $serviceCode,
            'shipping' => $shipping
        ];

        if(is_null($userId)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter userid!", json_encode($sendingParams) );
        }

        if(is_null($destinationAddress)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter destination_address!", json_encode($sendingParams) );
        }

        if(is_null($destinationName)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter destination name!", json_encode($sendingParams) );
        }

        if(is_null($paymentType)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter payment_type!", json_encode($sendingParams) );
        }

        if($paymentType == 1){
            return $this->additionalFunction->returnApiMessage($apiName, 500, "Payment type underconstruction!", json_encode($sendingParams) );
        }

        $activeUser = User::where(['id' => $userId])->first();
        if(is_null($activeUser)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "User not found!", json_encode($sendingParams) );
        }

        
        $orders = Order::where(['order_users_id' => $userId, 'order_order_status_id' => 1])->get();
        try{
            foreach ($orders as $key => $order) {
                $total = 0;
                foreach ($order->getOrderItems as $key => $orderItem) {


                    if($orderItem->getFishItem->fish_item_quantity - $orderItem->order_item_quantity < 0){
                        return $this->additionalFunction->returnApiMessage($apiName, 404, $orderItem->getFishItem->fish_item_name." Out of stock!", json_encode($sendingParams) );
                    }


                    if($order->order_order_kinds_id == 1){
                        //Per kilo
                        $total += $orderItem->getFishItem->fish_item_normal_price * $orderItem->order_item_quantity;
                    }else{
                        //Per ekor
                        $total += $orderItem->getFishItem->fish_item_specific_price * $orderItem->getFishItem->fish_item_weight;
                    }
                }

                $orderItem->getFishItem->fish_item_quantity = $orderItem->getFishItem->fish_item_quantity - $orderItem->order_item_quantity;
                $orderItem->getFishItem->save();

                $order->order_order_status_id = 2;
                $order->order_total = $total;
                $order->order_shipping_cost = $shipping;
                $order->order_destination_name = $destinationName;
                $order->order_destination_address = $destinationAddress;
                $order->order_payment_types_id = $paymentType;
                $order->service_code = $serviceCode;
                $order->save();
            }

            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Checkout success! Check your help for next step',
            ];


            return response()->json($params);


        }catch(\Exception $e){
            return $this->additionalFunction->returnApiMessage($apiName, 500, "Failed to checkout your cart!", json_encode($sendingParams) );
        }


    }
}