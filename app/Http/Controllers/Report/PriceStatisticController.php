<?php
namespace App\Http\Controllers\Report;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 12/6/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\FishItem;
use App\Models\FishSizeCategory;
use App\Models\FishCategory;

class PriceStatisticController extends Controller
{
    public function index()
    {
        $fishItems = FishItem::all();
        $data = [];
        foreach ($fishItems as $num => $fishItem){
            $data[] = [
                'fish_name' => $fishItem->fish_item_name,
                'normal_price' => $fishItem->fish_item_normal_price,
                'spesific_price' => $fishItem->fish_item_specific_price
            ];
        }

        $params = [
            'data' => $data
        ];

        return view('backend.report.price-statistic.index', $params);
    }
}