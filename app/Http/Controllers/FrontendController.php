<?php
/**
 * Created by Budi Santoso.
 * User: User
 * Date: 9/27/2017
 * Time: 9:31 AM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function prices()
    {
        return view('frontend.prices');
    }
}