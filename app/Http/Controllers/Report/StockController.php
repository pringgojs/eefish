<?php
namespace App\Http\Controllers\Report;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 12/3/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\FishItem;
use App\Models\FishSizeCategory;
use App\Models\FishCategory;

class StockController extends Controller
{
    public function index()
    {
        $sizes = FishSizeCategory::all();
        $params = [
            'sizes' => $sizes
        ];

        return view('backend.report.stock.index', $params);
    }

    public function show(Request $request)
    {
        $size = $request->input('size');
        $fishes = FishItem::where(['fish_item_fish_size_categories_id' => $size])->get();

        $params = [
            'data' => $fishes
        ];

        return view('backend.report.stock.show', $params);
    }
}