<?php
namespace App\Http\Controllers\Report;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 12/3/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Period;
use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\FishItem;
use App\Models\FishSizeCategory;
use App\Models\FishCategory;

class PeriodSellingController extends Controller
{
    public function index()
    {
        $periods = Period::orderBy('period_name', 'DESC')->get();
        $params = [
            'periods' => $periods
        ];

        return view('backend.report.period-selling.index', $params);
    }

    public function show(Request $request)
    {
        $periodId = $request->input('period_id');
        $period = Period::find($periodId);
        $beforePeriod = $period->period_name - 1;
        $afterPeriod = $period->period_name + 1;

        $jumlahPemasukan = Order::whereRaw("order_created_at BETWEEN '".($beforePeriod)."-12-31' AND '".($afterPeriod)."-01-01' ")
            ->sum('order_total');

        $jumlahBiayaPengiriman = Order::whereRaw("order_created_at BETWEEN '".($beforePeriod)."-12-31' AND '".($afterPeriod)."-01-01' ")
            ->sum('order_shipping_cost');

        $orders = Order::whereRaw("order_created_at BETWEEN '".($beforePeriod)."-12-31' AND '".($afterPeriod)."-01-01' ")
            ->orderBy('order_created_at', 'DESC')
            ->get();

        $transaksiBulanan = [];
        for ($i = 1; $i <= 12; $i++){
            $month = $i;

            if($month == 1){
                $monthOrder  = Order::whereRaw("order_created_at BETWEEN '".($beforePeriod)."-12-31' AND '".($period->period_name)."-01-01' ")
                    ->sum('order_total');

            }elseif($month == 12){
                $monthOrder  = Order::whereRaw("order_created_at BETWEEN '".($period->period_name)."-11-31' AND '".($afterPeriod)."-01-01' ")
                    ->sum('order_total');
            }else{
                $previousMonth = "".$month-1;
                $afterMonth = "".$month+1;
                $monthOrder  = Order::whereRaw("order_created_at BETWEEN '".($period->period_name)."-".$previousMonth."-31' AND '".($period->period_name)."-".$afterMonth."-01' ")
                    ->sum('order_total');
            }

            $transaksiBulanan[] = [
                'month' => $this->generateMonth($month),
                'value' => $monthOrder
            ];
        }


        $params = [
            'jumlahPemasukan' => $jumlahPemasukan,
            'jumlahBiayaPengiriman' => $jumlahBiayaPengiriman,
            'orders' => $orders,
            'transaksiBulanan' => $transaksiBulanan
        ];

        //return response()->json($params);
        return view('backend.report.period-selling.report', $params);

    }

    private function generateMonth($idx)
    {
        if(strlen($idx) < 2){
            $idx = '0'.$idx;
        }
        $months = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11'=> 'November',
            '12' => 'Desember'
        ];

        return $months[$idx];
    }
}