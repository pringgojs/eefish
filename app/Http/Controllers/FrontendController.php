<?php
/**
 * Created by Budi Santoso.
 * User: User
 * Date: 9/27/2017
 * Time: 9:31 AM
 */
namespace App\Http\Controllers;
use App\Models\Fish;
use App\Models\Link;
use App\Models\Page;
use App\Models\Gallery;
use App\Models\FishCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $view = view('frontend.index');
        $view->link_header = Link::where('link_position', 'header')->get();
        $view->link_footer = Link::where('link_position', 'footer')->get();
        $view->galleries_page_one = Gallery::skip(0)->take(3)->get();
        $view->galleries_page_two = Gallery::skip(3)->take(6)->get();
        return $view;
    }

    public function page($link_page)
    {
        $view = view('frontend.page');
        $view->page = Page::where('link', $link_page)->first();
        $view->title = $view->page->name;
        $view->link_sidebar = Link::where('link_position', 'sidebar')->where('link_is_parent', 1)->get();
        $view->link_footer = Link::where('link_position', 'footer')->get();
        $view->link_header = Link::where('link_position', 'header')->get();
        if (!$view->page) {
            return redirect(url('/'));
        }

        return $view;
    }

    public function catalog($category_id = "")
    {
        $view = view('frontend.catalog');
        $view->link_footer = Link::where('link_position', 'footer')->get();
        $view->link_header = Link::where('link_position', 'header')->get();
        $view->categories = FishCategory::all();
        $view->category = $category_id ? FishCategory::find($category_id) : '';
        $view->fishes = $category_id ? Fish::where('fish_fish_categories_id', $category_id)->paginate(12) : Fish::paginate(12);
        $view->title = 'Catalog';
        return $view;
    }

}