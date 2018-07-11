<?php

namespace App\Http\Controllers\Content;

use App\Models\Link;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    public function index()
    {
        $view = view('backend.content.link.index');
        $view->links = Link::all();
        return $view;
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        
        $view = view('backend.content.link.form');
        $view->data = $id ? Link::find($id) : new Link;
        $view->pages = Page::all();
        $view->links = Link::where('link_is_parent', 1)->get();
        return $view;
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $data = $id ? Link::find($id) : new Link;
        $data->link_position = $request->input('link_position');
        $data->link_is_parent = $request->input('is_sublink') == 'on' ? 0 : 1;
        $data->link_parent_id = $data->link_is_parent == 0 && $request->input('link_parent_id') > 0 ? $request->input('link_parent_id') : 0;
        $data->link_name = $request->input('link_name');
        $data->link_url = $request->input('link_url') != null ? $request->input('link_url') : '#';
        $data->save();
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
        $data = Link::find($id);

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
