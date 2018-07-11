<?php
namespace App\Http\Controllers\Transaction;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 6/1/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class RecordTransactionController extends Controller
{
    public function index()
    {
        return view('backend.transaction.record.index');
    }

    public function show(Request $request)
    {
        $orderStatus = $request->input('status');
        $startDate = date("Y/m/d", strtotime($request->input('start_date')));
        $endDate = date("Y/m/d", strtotime($request->input('end_date')));

        if($orderStatus == 0){
            $data = Order::whereRaw("order_created_at BETWEEN  '".date("Y-m-d H:i:s", strtotime($startDate))."' AND '".date("Y-m-d H:i:s", strtotime($endDate))."' ")
                ->orderBy('order_created_at', 'DESC')
                ->get();
        }else{
            $data = Order::where(['order_order_status_id' => $orderStatus])
                ->whereRaw("order_created_at BETWEEN  '".date("Y-m-d H:i:s", strtotime($startDate))."' AND '".date("Y-m-d H:i:s", strtotime($endDate))."' ")
                ->orderBy('order_created_at', 'DESC')
                ->get();
        }

        $params = [
            'data' => $data
        ];

        return view('backend.transaction.record.result', $params);
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        if($id){

            $order = Order::find($id);
            if(!is_null($order)){
                $orderItems = $order->getOrderItems;

                $params = [
                    'order' => $order,
                    'orderItems' => $orderItems,

                ];

                return view('backend.transaction.record.detail', $params);

            }else{
                return "<div class='alert alert-danger'>Order tidak tersedia!</div>";
            }

        }else{
            return "<div class='alert alert-danger'>Data tidak tersedia!</div>";
        }
    }
}