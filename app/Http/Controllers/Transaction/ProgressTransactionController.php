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
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class ProgressTransactionController extends Controller
{
    public function index()
    {
        $data = Order::whereNotIn('order_order_status_id', [1, 3, 4])
            ->orderBy('order_created_at', 'DESC')->get();

        $params = [
            'data' => $data
        ];
        return view('backend.transaction.progress.index', $params);
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        if($id){

            $order = Order::find($id);
            if(!is_null($order)){
                $orderItems = $order->getOrderItems;

                $orderStatus = OrderStatus::whereNotIn('id', [1])->get();

                $params = [
                    'order' => $order,
                    'orderItems' => $orderItems,
                    'orderStatus' => $orderStatus

                ];

                return view('backend.transaction.progress.detail', $params);

            }else{
                return "<div class='alert alert-danger'>Order tidak tersedia!</div>";
            }

        }else{
            return "<div class='alert alert-danger'>Data tidak tersedia!</div>";
        }
    }
    
    

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        if(is_null($id)){
            return "<div class='alert alert-danger'>Order tidak tersedia!</div>";
        }else{
            $data = Order::find($id);
            $data->order_order_status_id = $request->input('order_order_status_id');
            try{
                $data->save();

                return "
                <div class='alert alert-success'>Data berhasil disimpan!</div>
                <script> scrollToTop(); reload(1000); </script>";
            }catch (\Exception $e){
                return "<div class='alert alert-danger'>Data gagal disimpan!</div>";
            }
        }
    }
}