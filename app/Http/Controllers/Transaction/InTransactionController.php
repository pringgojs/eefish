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

class InTransactionController extends Controller
{
    public function index()
    {
        $data = Order::where(['order_order_status_id' => 1])
            ->orderBy('order_created_at', 'DESC')->get();

        $params = [
            'data' => $data
        ];
        return view('backend.transaction.in.index', $params);
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
                    'orderItems' => $orderItems

                ];

                return view('backend.transaction.in.detail', $params);

            }else{
                return "<div class='alert alert-danger'>Order tidak tersedia!</div>";
            }

        }else{
            return "<div class='alert alert-danger'>Data tidak tersedia!</div>";
        }
    }

    public function updateToProcess(Request $request)
    {
        $id = $request->input('id');
        if(is_null($id)){
            return "<div class='alert alert-danger'>Order tidak tersedia!</div>";
        }else{
            $data = Order::find($id);
            $data->order_order_status_id = 2;
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