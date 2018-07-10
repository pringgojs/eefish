<?php
/**
 * Created by Budi Santoso.
 * User: User
 * Date: 9/27/2017
 * Time: 9:31 AM
 */
namespace App\Http\Controllers;
use App\Models\Link;
use App\Models\Page;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $view = view('frontend.index');
        $view->link_header = Link::where('link_position', 'header')->get();
        $view->link_footer = Link::where('link_position', 'footer')->get();
        return $view;
    }

    public function page($link_page)
    {
        $view = view('frontend.page');
        $view->page = Page::where('link', $link_page)->first();
        $view->link_sidebar = Link::where('link_position', 'sidebar')->where('link_is_parent', 1)->get();
        $view->link_footer = Link::where('link_position', 'footer')->get();
        $view->link_header = Link::where('link_position', 'header')->get();
        if (!$view->page) {
            return redirect(url('/'));
        }

        return $view;
    }

    public function catalog()
    {
        $view = view('frontend.catalog');
        $view->page = Page::where('link', $link_page)->first();
        $view->link_sidebar = Link::where('link_position', 'sidebar')->where('link_is_parent', 1)->get();
        $view->link_footer = Link::where('link_position', 'footer')->get();
        $view->link_header = Link::where('link_position', 'header')->get();
        return $view;
    }

}