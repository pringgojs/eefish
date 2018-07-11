<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 9:37 AM
 */
namespace App\Http\Controllers\Api;
use App\Models\Order;
use App\Models\OrderItem;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FishCategory;
use App\Models\Fish;
use App\Models\FishItem;
use App\Classes\AdditionalFunctionClass;

class ApiFeedbackController extends Controller
{
	private $additionalFunction;

    public function __construct()
    {
        $this->additionalFunction = new AdditionalFunctionClass();
    }

    public function postFeedback(Request $request)
    {
        $orderId = $request->input('order_id');
        $feedbackValue = $request->input('feedback_value');

        $sendingParams = [
            'order_id' => $orderId,
            'feedback_value' => $feedbackValue
        ];

        if(is_null($orderId)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter order_id!", json_encode($sendingParams) );
        }

        if(is_null($feedbackValue)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter feedback_value!", json_encode($sendingParams) );
        }

        $order = Order::find($orderId);
        if(is_null($order)){
        	return $this->additionalFunction->returnApiMessage($apiName, 404, "Order not found!", json_encode($sendingParams) );
        }

        try{
        	$order->order_user_feedback = $feedbackValue;
        	$order->save();

        	$params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Feedback successfully stored!',
            ];


            return response()->json($params);

        }catch(\Exception $e){
        	return $this->additionalFunction->returnApiMessage($apiName, 500, "Failed to store feedback value!", json_encode($sendingParams) );
        }

    }
}