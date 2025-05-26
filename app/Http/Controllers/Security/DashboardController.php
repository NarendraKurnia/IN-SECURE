<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Models\Shiftmasuk_Model;
use App\Models\Shiftselesai_Model;
use App\Models\User_model;
use App\Models\Unit;
use Carbon\Carbon;

class DashboardController extends Controller
{
   public function index()
{
    $today = Carbon::today()->toDateString();

    $total_shift_masuk = Shiftmasuk_Model::whereDate('tanggal_shift', $today)->count();
    $total_shift_selesai = Shiftselesai_Model::whereDate('tanggal_shift', $today)->count();

    // Ambil catatan shift selesai terbaru dari hari ini (prioritas shift pagi/siang)
    $catatan_terakhir = Shiftselesai_Model::whereDate('tanggal_shift', $today)
    ->orderBy('tanggal_shift', 'desc') // ganti dari updated_at
    ->value('catatan_shift_selanjutnya');

// Jika tidak ada shift selesai hari ini, ambil shift malam terakhir (hari sebelumnya)
if (!$catatan_terakhir) {
    $catatan_terakhir = Shiftselesai_Model::where('shift', 'Malam')
        ->whereDate('tanggal_shift', '<', $today)
        ->orderBy('tanggal_shift', 'desc')
        ->value('catatan_shift_selanjutnya');
}

    // Petugas shift hari ini
    $petugas_shift = Shiftmasuk_Model::whereDate('tanggal_shift', $today)
        ->select('nama_security_1', 'nama_security_2', 'nama_security_3', 'shift', 'tanggal_shift')
        ->get();

    // Unit aktif
    $unit_id = session()->get('unit_id');
    $unit = Unit::where('id_unit', $unit_id)->first();

    // Rekap security 30 hari terakhir
    $startDate = Carbon::today()->subDays(30);
    $rekap_security = Shiftmasuk_Model::where('tanggal_shift', '>=', $startDate)
        ->get()
        ->flatMap(function ($shift) {
            return collect([$shift->nama_security_1, $shift->nama_security_2, $shift->nama_security_3])
                ->filter()
                ->map(function ($nama) {
                    return trim($nama);
                });
        })
        ->countBy();

    return view('security/layout/wrapper', [
        'title' => 'Dashboard Admin',
        'unit' => $unit,
        'content' => 'security/dashboard/index',
        'total_shift_masuk' => $total_shift_masuk,
        'total_shift_selesai' => $total_shift_selesai,
        'catatan_terakhir' => $catatan_terakhir,
        'petugas_shift' => $petugas_shift,
        'rekap_security' => $rekap_security,
    ]);
}
public function cetak($nama_security)
{
    // Ambil shift masuk dan selesai untuk nama ini dalam 30 hari terakhir
    $tanggal_batas = Carbon::now()->subDays(30)->toDateString();

    $shiftMasuk = Shiftmasuk_Model::where('nama_security_1', $nama_security)
        ->whereDate('tanggal_shift', '>=', $tanggal_batas)
        ->get();

    $shiftSelesai = Shiftselesai_Model::where('nama_security_1', $nama_security)
        ->whereDate('tanggal_shift', '>=', $tanggal_batas)
        ->get();

    return view('security.dashboard.security_cetak', compact('nama_security', 'shiftMasuk', 'shiftSelesai'));
}
}
