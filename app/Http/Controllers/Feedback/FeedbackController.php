<?php
namespace App\Http\Controllers\Feedback;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 12/3/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\FishItem;
use App\Models\FishSizeCategory;
use App\Models\FishCategory;

class FeedbackController extends Controller
{
    public function index()
    {
        $data = Order::where(['order_order_status_id' => 3])
            ->whereNotNull('order_user_feedback')
            ->orderBy('order_created_at', 'DESC')->get();
        $params = [
            'data' => $data
        ];

        return view('backend.feedback.record.index', $params);
    }
}