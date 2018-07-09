<?php
namespace App\Http\Controllers\Master;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 5/11/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KurirController extends Controller
{
    public function index()
    {
        $data = Courier::orderBy('courier_name', 'ASC')->get();
        $params = [
            'data' => $data
        ];
        return view('backend.master.kurir.index', $params);
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = Courier::find($id);
        }else{
            $data = new Courier();
        }

        $params = [
            'data' => $data
        ];

        return view('backend.master.kurir.form', $params);
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = Courier::find($id);
        }else{
            $data = new Courier();
            $data->courier_balance = 0;
        }

        $data->courier_name = $request->input('courier_name');
        $data->courier_identity_number = $request->input('courier_identity_number');
        $data->courier_address = $request->input('courier_address');
        $data->courier_phone_number = $request->input('courier_phone_number');
        $data->courier_user_name = $request->input('courier_user_name');
        $data->courier_password = sha1($request->input('courier_password'));

        /******** Save image ***************/
        $picture = $request->file('courier_picture');
        if (isset($picture)) {
            $filename = date("YmdHis"). '-' . $picture->getClientOriginalName();
            if ($picture->move("public/uploads/kurir", $filename)) {
                $data->courier_picture = $filename;
            }
        }

        /**********************************/

        try{
            $data->save();
            return "
            <div class='alert alert-success'>Data berhasil disimpan!</div>
            <script> scrollToTop(); reload(1000); </script>";
        }catch (\Exception $e){
            return "<div class='alert alert-danger'>Data gagal disimpan!</div>";
        }
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $data = Courier::find($id);
        try{
            $data->delete();
            return "
            <div class='alert alert-success'>Data berhasil dihapus!</div>
            <script> scrollToTop(); reload(1000); </script>";
        }catch (\Exception $e){
            return "<div class='alert alert-danger'>Data gagal dihapus!</div>";
        }
    }

    public function detail($id)
    {
        $user = Courier::find($id);
        $params = [
            'data' => $user
        ];

        return view('backend.master.kurir.detail', $params);
    }
}