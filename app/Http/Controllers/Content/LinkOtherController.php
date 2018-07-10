<?php

namespace App\Http\Controllers\Content;

use App\Models\LinkOther;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkOtherController extends Controller
{
    public function index()
    {
        $view = view('backend.page.link-other.index');
        $view->link_others = LinkOther::all();
        return $view;
    }

    public function show()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        
    }
}
