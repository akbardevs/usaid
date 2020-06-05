<?php

namespace App\Http\Controllers;

use App\Charts\DashChart;
use App\Charts\DonorChart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Pendonor;
use App\Donor;
use App\Penggunaan;
use App\Berita;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $api_pendonor = url('/pendonorchart');
        $api_donor = url('/donorchart');
        $donor = Donor::All();
        $terpakai = Penggunaan::All();
        $beritas = Berita::All();
        $wg_d = $donor->count();
        $wg_p = $terpakai->count();
        $wg_b = $beritas->count();
        
            $ap = 0;
            $am = 0;
            $bp = 0;
            $bm = 0;
            $abp = 0;
            $abm = 0;
            $op = 0;
            $om = 0;
        
        foreach ($terpakai as $value) {
           
            if ($value->gol_darah == 'A+') {
                $ap = $ap + $value->jumlah;
            } else if ($value->gol_darah == 'A-') {
                $am = $am + $value->jumlah;
            } else if ($value->gol_darah == 'B+') {
                $bp = $bp + $value->jumlah;
            } else if ($value->gol_darah == 'B-') {
                $bm = $bm + $value->jumlah;
            } else if ($value->gol_darah == 'AB+') {
                $abp = $abp + $value->jumlah;
            } else if ($value->gol_darah == 'AB-') {
                $abm = $abm + $value->jumlah;
            } else if ($value->gol_darah == 'O+') {
                $op = $op + $value->jumlah;
            } else {
                $om = $om + $value->jumlah;
            }
            
        }
            $tap = 0;
            $tam = 0;
            $tbp = 0;
            $tbm = 0;
            $tabp = 0;
            $tabm = 0;
            $top = 0;
            $tom = 0;
        foreach ($donor as $value) {
           
            if ($value->pendonor->gol_darah == 'A+') {
                $tap = $tap + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'A-') {
                $tam = $tam + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'B+') {
                $tbp = $tbp + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'B-') {
                $tbm = $tbm + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'AB+') {
                $tabp = $tabp + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'AB-') {
                $tabm = $tabm + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'O+') {
                $top = $top + $value->jumlah;
            } else {
                $tom = $tom + $value->jumlah;
            }
            
        }

        $dashsChart = new DashChart;
        $dashsChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'])->load($api_pendonor);
        $donorsChart = new DonorChart;
        $donorsChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'])->load($api_donor);
        $stoksChart = new DonorChart;
        $stoksChart->labels(['A+','A-','B+','B-','AB+','AB-','O+','O-']);
        $stoksChart->dataset('Stok Tersedia', 'pie', [$tap - $ap,$tam - $am,$tbp - $bp,$tbm - $bm,$tabp - $abp,$tabm - $abm,$top - $op,$tom - $om])->options([
                    'backgroundColor' => ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#FFFF00', '#d2d6de','#D91610','#51C1C0'],
                    'responsive' => 'true',
                    'maintainAspectRatio' => 'false',
                ]);
        
        
        return view('home', [ 'stoksChart' => $stoksChart,'dashChart' => $dashsChart, 'donorChart' => $donorsChart, 'wg_d' => $wg_d, 'wg_p' => $wg_p, 'wg_b' => $wg_b ] );
    }

    public function donorchart(Request $request)
      {
        $year = $request->has('year') ? $request->year : date('Y');
        $donors = Donor::whereYear('tgl_donor', $year)->get();
                    $jan = 0;
                    $feb = 0;
                    $mar = 0;
                    $apr = 0;
                    $mei = 0;
                    $jun = 0;
                    $jul = 0;
                    $aug = 0;
                    $sep = 0;
                    $okt = 0;
                    $nov = 0;
                    $des = 0;
                foreach ($donors as $donor) {
                    if (date('n',strtotime($donor->tgl_donor)) == 1) {
                        $jan = $jan + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 2) {
                        $feb = $feb + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 3) {
                        $mar = $mar + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 4) {
                        $apr = $apr + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 5) {
                        $mei = $mei + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 6) {
                        $jun = $jun + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 7) {
                        $jul = $jul + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 8) {
                        $aug = $aug + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 9) {
                        $sep = $sep + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 10) {
                        $okt = $okt + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 11) {
                        $nov = $nov + $donor->jumlah;
                    } elseif (date('n',strtotime($donor->tgl_donor)) == 12) {
                    $des = $des + $donor->jumlah;
                    }
          
                }
                
              
                
                
        
    
        $donorChart = new DonorChart;
  
        $donorChart->dataset('Jumlah Donor(Kantong)', 'line', [$jan,$feb,$mar,$apr,$mei,$jun,$jul,$aug,$sep,$okt,$nov,$des])->options([
                    'fill' => 'true',
                    'borderColor' => '#D91610'
                ]);
  
        return $donorChart->api();
      }

     public function pendonorchart(Request $request)
      {
        $year = $request->has('year') ? $request->year : date('Y');
        $users = Pendonor::whereYear('created_at', $year)->get();
                    $jan = 0;
                    $feb = 0;
                    $mar = 0;
                    $apr = 0;
                    $mei = 0;
                    $jun = 0;
                    $jul = 0;
                    $aug = 0;
                    $sep = 0;
                    $okt = 0;
                    $nov = 0;
                    $des = 0;
                     foreach ($users as $user) {
                        if (date('n',strtotime($user->created_at)) == 1) {
                            $jan = $jan + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 2) {
                            $feb = $feb + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 3) {
                            $mar = $mar + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 4) {
                            $apr = $apr + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 5) {
                            $mei = $mei + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 6) {
                            $jun = $jun + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 7) {
                            $jul = $jul + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 8) {
                            $aug = $aug + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 9) {
                            $sep = $sep + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 10) {
                            $okt = $okt + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 11) {
                            $nov = $nov + 1;
                        } elseif (date('n',strtotime($user->created_at)) == 12) {
                        $des = $des + 1;
                        }
          
                }
  
        $dashChart = new DashChart;
  
        $dashChart->dataset('Jumlah Pendonor', 'line', [$jan,$feb,$mar,$apr,$mei,$jun,$jul,$aug,$sep,$okt,$nov,$des])->options([
                    'fill' => 'true',
                    'borderColor' => '#51C1C0'
                ]);
  
        return $dashChart->api();
      }
}
