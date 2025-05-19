<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shiftmasuk_Model;
use App\Models\Shiftselesai_Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    // Endpoint API
    public function apiData()
{
    $today = Carbon::today()->toDateString();

    $total_shift_masuk = Shiftmasuk_Model::whereDate('tanggal_shift', $today)->count();
    $total_shift_selesai = Shiftselesai_Model::whereDate('tanggal_shift', $today)->count();

    $data_masuk = Shiftmasuk_Model::selectRaw('tanggal_shift as tanggal, count(*) as jumlah')
        ->where('tanggal_shift', '>=', Carbon::now()->subDays(6)->toDateString())
        ->groupBy('tanggal_shift')
        ->orderBy('tanggal_shift')
        ->get();

    $catatan_terakhir = Shiftselesai_Model::where('shift', 'Malam')
        ->orderBy('tanggal_shift', 'desc')
        ->value('catatan_shift_selanjutnya');

    return response()->json([
        'today' => $today,
        'total_shift_masuk' => $total_shift_masuk,
        'total_shift_selesai' => $total_shift_selesai,
        'grafik' => $data_masuk,
        'catatan_terakhir' => $catatan_terakhir,
    ]);
}


    // View dashboard
    public function index()
    {
        return view('security/layout/wrapper', [
            'title' => 'Dashboard Admin',
            'content' => 'security/dashboard/index'
        ]);
    }
}
