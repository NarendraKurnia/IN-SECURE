<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shiftmasuk_Model;
use App\Models\Shiftselesai_Model;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardApiController extends Controller
{
    public function rekap(Request $request)
    {
        $today = Carbon::today()->toDateString();

        $total_shift_masuk = Shiftmasuk_Model::whereDate('tanggal_shift', $today)->count();
        $total_shift_selesai = Shiftselesai_Model::whereDate('tanggal_shift', $today)->count();

        return response()->json([
            'tanggal' => $today,
            'total_shift_masuk' => $total_shift_masuk,
            'total_shift_selesai' => $total_shift_selesai,
        ]);
    }
}


