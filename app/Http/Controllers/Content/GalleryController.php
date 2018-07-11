<?php

namespace App\Http\Controllers\Content;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $view = view('backend.content.gallery.index');
        $view->galleries = Gallery::all();
        return $view;
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        
        $view = view('backend.content.gallery.form');
        $view->data = $id ? Gallery::find($id) : new Gallery;
        return $view;
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $data = $id ? Gallery::find($id) : new Gallery;
        $data->gallery_name = trim($request->input('gallery_name'));

        $picture = $request->file('gallery_photo');
        if ($id) {
            if (isset($picture)) {
                $path = public_path('uploads/gallery/'.$data->gallery_photo);
                if (file_exists($path)) {
                    \File::delete($path);
                }
            }
        }
        
        if (isset($picture)) {
            $filename = date("YmdHis"). '-' . $picture->getClientOriginalName();
            if ($picture->move("public/uploads/gallery", $filename)) {
                $data->gallery_photo = $filename;
            }
        }
        
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
        $data = Gallery::find($id);

        try{
            $data->delete();
            return "
            <div class='alert alert-success'>Data berhasil dihapus!</div>
            <script> scrollToTop(); reload(1000); </script>";
        }catch (\Exception $e){
            return "<div class='alert alert-danger'>Data gagal dihapus!</div>";
        }
    }
}
