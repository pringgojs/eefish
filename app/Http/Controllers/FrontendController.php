<?php
/**
 * Created by Budi Santoso.
 * User: User
 * Date: 9/27/2017
 * Time: 9:31 AM
 */
namespace App\Http\Controllers;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function page($link_page)
    {
        $view = view('frontend.services');
        $view->page = Page::where('link', $link_page)->first();
        if (!$view->page) {
            return redirect(url('/'));
        }

        return $view;
    }

}