<?php
/**
 * Created by Budi Santoso.
 * User: User
 * Date: 9/27/2017
 * Time: 9:31 AM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Fish;
use App\Models\FishCategory;
use App\Models\FishItem;
use App\Models\FishSizeCategory;
use App\Models\Order;
use App\Models\Period;
use App\Models\User;

class BackendController extends Controller
{
    public function index(Request $request){
        if ($request->session()->exists('activeUser')) {

            $jumlahPengguna = User::count();
            $jumlahKurir = Courier::count();
            $jumlahPenjualan = Order::where(['order_order_status_id' => 3])->count();
            $jumlahTunggu = Order::where(['order_order_status_id' => 1])->count();
            $jumlahOrderGagal = Order::where(['order_order_status_id' => 4])->count();
            $jumlahIkan = Fish::count();
            $jumlahKategoriIkan = FishCategory::count();
            $ikanTerakhirDitambahkan = FishItem::orderBy('id', 'DESC')->limit(5)->get();


            $period = Period::where(['period_name' => date("Y")])->first();
            $beforePeriod = $period->period_name - 1;
            $afterPeriod = $period->period_name + 1;

            $transaksiBulanan = [];
            for ($i = 1; $i <= 12; $i++){
                $month = $i;

                if($month == 1){
                    $monthOrder  = Order::whereRaw("order_created_at BETWEEN '".($beforePeriod)."-12-31' AND '".($period->period_name)."-02-01' ")
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
                'jumlahPengguna' => $jumlahPengguna,
                'jumlahKurir' => $jumlahKurir,
                'jumlahPenjualan' => $jumlahPenjualan,
                'jumlahTunggu' => $jumlahTunggu,
                'jumlahIkan' => $jumlahIkan,
                'jumlahKategoriIkan' => $jumlahKategoriIkan,
                'jumlahOrderGagal' => $jumlahOrderGagal,
                'ikanTerakhir' => $ikanTerakhirDitambahkan,
                'transaksiBulanan' => $transaksiBulanan
            ];

            return view('backend.dashboard.index', $params);
        }else{
            return redirect('login');
        }
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