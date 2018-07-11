<?php

namespace App\Http\Controllers\Content;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        $view = view('backend.content.page.index');
        $view->pages = Page::all();
        return $view;
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        
        $view = view('backend.content.page.form');
        $view->data = $id ? Page::find($id) : new Page;
        return $view;
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $data = $id ? Page::find($id) : new Page;
        $data->title = trim($request->input('title'));
        if (!$id)  {
            $data->link = str_replace(' ', '-', strtolower($data->title));
        }
        $data->content = $request->input('content');
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
        $data = Page::find($id);

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
