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

class ApiHistoryTransaksiController extends Controller
{

    /*
     * Action untuk proses ambil semua
     * Created by Budi Santoso
     * Params @username and @password
     */


        public function all(Request $request, $userid)
        {
            $activeUser = User::find($userid);
            if(is_null($activeUser))
            {
                $params = [
                    'code' => 404,
                    'description' => 'Not Found',
                    'message' => 'User not found!',
                    'data' => []
                ];
                return response()->json($params);
            }

            $orders = Order::where(['order_users_id' => $activeUser->id ])->whereIn('order_order_status_id', [2,3])->orderBy('order_order_status_id', 'ASC')->get();
            $data = [];
            foreach ($orders as $num => $order) {
                if(is_null($order->order_user_feedback)){
                    $orderFeedbackStatus  = 0;
                }else{
                    $orderFeedbackStatus  = 1;
                }

                $data[] = [
                    'order_id' => "".$order->id,
                    'userid' => "".$activeUser->id,
                    'order_kind' => $order->getOrderKind->id,
                    'order_date' => date("d-m-Y H:i:s", strtotime($order->order_created_at)),
                    'order_total' => "".$order->order_total,
                    'order_shipping_cost' => "".$order->order_shipping_cost,
                    'order_status' => "".$order->getOrderStatus->order_status_name,
                    'order_address' => "".$order->order_destination_address,
                    'order_name' => "".$order->order_destination_name,
                    'order_feedback_status' => $orderFeedbackStatus,
                    'order_is_pay' => "".$order->order_is_pay
                ];
            }

            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Hitory transaction user found!',
                'data' => $data
            ];
            return response()->json($params);
        }

        public function onGoingTransaction(Request $request, $userid)
        {
            $activeUser = User::find($userid);
            if(is_null($activeUser))
            {
                $params = [
                    'code' => 404,
                    'description' => 'Not Found',
                    'message' => 'User not found!',
                    'data' => []
                ];
                return response()->json($params);
            }

            $orders = Order::where(['order_users_id' => $activeUser->id ,'order_user_feedback' => null])->whereNotIn('order_order_status_id', [3])->get();
            $data = [];
            foreach ($orders as $num => $order) {
                $data[] = [
                    'order_id' => "".$order->id,
                    'userid' => "".$activeUser->id,
                    'order_kind' => $order->getOrderKind->id,
                    'order_date' => date("d-m-Y H:i:s", strtotime($order->order_created_at)),
                    'order_total' => "".$order->order_total,
                    'order_shipping_cost' => "".$order->order_shipping_cost,
                    'order_status' => "".$order->getOrderStatus->order_status_name,
                    'order_address' => "".$order->order_destination_address,
                    'order_name' => "".$order->order_destination_name
                ];
            }

            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Hitory transaction user found!',
                'data' => $data
            ];
            return response()->json($params);

        }


    public function onSuccessTransaction(Request $request, $userid)
    {
        $activeUser = User::find($userid);
        if(is_null($activeUser))
        {
            $params = [
                'code' => 404,
                'description' => 'Not Found',
                'message' => 'User not found!',
                'data' => []
            ];
            return response()->json($params);
        }

        $orders = Order::where(['order_users_id' => $activeUser->id, 'order_user_feedback' => null ])->whereIn('order_order_status_id', [3])->get();
        $data = [];
        foreach ($orders as $num => $order) {
            $data[] = [
                'order_id' => "".$order->id,
                'userid' => "".$activeUser->id,
                'order_kind' => $order->getOrderKind->id,
                'order_date' => date("d-m-Y H:i:s", strtotime($order->order_created_at)),
                'order_total' => "".$order->order_total,
                'order_shipping_cost' => "".$order->order_shipping_cost,
                'order_status' => "".$order->getOrderStatus->order_status_name,
                'order_address' => "".$order->order_destination_address,
                'order_name' => "".$order->order_destination_name
            ];
        }

        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Hitory transaction user found!',
            'data' => $data
        ];
        return response()->json($params);

    }
}