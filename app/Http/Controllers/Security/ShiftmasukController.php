<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Shiftmasuk_Model;
use App\Models\Shiftselesai_Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class ShiftmasukController extends Controller
{
    public function index(Request $request)
    {
        $m_shift = new Shiftmasuk_Model();
        $all = collect($m_shift->listing());

        // Ambil semua data shift selesai
        $m_shift_selesai = new Shiftselesai_Model();
        $selesai_all = collect($m_shift_selesai->listing());

        $shift_order = ['Pagi' => 1, 'Siang' => 2, 'Malam' => 3];

        $all = $all->map(function ($item) use ($selesai_all, $shift_order) {
            $current_order = $shift_order[$item->shift] ?? null;

            if ($current_order && $current_order > 1) {
                $prev_shift = array_search($current_order - 1, $shift_order);
                $prev_shift_item = $selesai_all->first(function ($s) use ($item, $prev_shift) {
                    return $s->tanggal_shift === $item->tanggal_shift && $s->shift === $prev_shift;
                });
            } else {
                $prev_date = date('Y-m-d', strtotime($item->tanggal_shift . ' -1 day'));
                $prev_shift_item = $selesai_all->first(function ($s) use ($prev_date) {
                    return $s->tanggal_shift === $prev_date && $s->shift === 'Malam';
                });
            }

            $item->catatan_shift_sebelumnya = $prev_shift_item->catatan_shift_selanjutnya ?? null;

            return $item;
        });

        // Filter jika ada pencarian keyword
        if ($request->filled('keywords')) {
            $keywords = strtolower($request->keywords);
            $all = $all->filter(function ($item) use ($keywords) {
                return str_contains(strtolower($item->tanggal_shift), $keywords)
                    || str_contains(strtolower($item->nama_security_1), $keywords)
                    || str_contains(strtolower($item->nama_security_2), $keywords)
                    || str_contains(strtolower($item->nama_security_3), $keywords);
            });
        }

        // Manual pagination
        $perPage = 10;
        $page = $request->get('page', 1);
        $slice = $all->slice(($page - 1) * $perPage)->values();
        $shift_masuk = new LengthAwarePaginator(
            $slice,
            $all->count(),
            $perPage,
            $page,
            ['path' => url('security/shift-masuk'), 'query' => $request->query()]
        );

        return view('security/layout/wrapper', [
            'title' => 'Data Shift Masuk',
            'shift_masuk' => $shift_masuk,
            'content' => 'security/shift-masuk/index'
        ]);
    }

    // Form tambah
    public function tambah()
    {
        return view('security/layout/wrapper', [
            'title'   => 'Masuk Shift',
            'content' => 'security/shift-masuk/tambah'
        ]);
    }

    // Proses tambah
    public function proses_tambah(Request $request)
{
    $request->validate([
        'nama_security_1' => 'required|string|max:100',
        'jam_kehadiran_1' => 'required',
        'nama_security_2' => 'required|string|max:100',
        'jam_kehadiran_2' => 'required',
        'nama_security_3' => 'nullable|string|max:100',
        'jam_kehadiran_3' => 'nullable',
        // 'tanggal_shift'   => 'required|date_format:d-m-Y', // dihapus, karena tidak dikirim
        'shift'           => 'required|in:Pagi,Siang,Malam',
        'foto'            => 'required|image|mimes:jpeg,png,jpg|max:8024'
    ]);

    // Generate tanggal_shift dari backend
    $now = Carbon::now();
    $shift = $request->shift;

    if ($shift === 'Malam' && $now->format('H') < 6) {
        $tanggal_shift = $now->subDay()->format('Y-m-d');
    } else {
        $tanggal_shift = $now->format('Y-m-d');
    }

    // Upload foto
    $nama_file = null;
    if ($file = $request->file('foto')) {
        $filename  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $nama_file = Str::slug($filename, '-') . '-' . time() .'.'. $file->getClientOriginalExtension();
        $file->move(public_path('admin/upload/shift'), $nama_file);
    }

    // Siapkan array data sesuai kolom
    $data = [
        'nama_security_1' => $request->nama_security_1,
        'jam_kehadiran_1' => $request->jam_kehadiran_1,
        'nama_security_2' => $request->nama_security_2,
        'jam_kehadiran_2' => $request->jam_kehadiran_2,
        'nama_security_3' => $request->nama_security_3,
        'jam_kehadiran_3' => $request->jam_kehadiran_3,
        'tanggal_shift'   => $tanggal_shift,
        'shift'           => $request->shift,
        'foto'            => $nama_file,
        'tanggal_update'  => now(),
    ];

    // Simpan data
    $m_shift = new Shiftmasuk_Model();
    $m_shift->tambah($data);

    return redirect('security/shift-masuk')
        ->with('sukses', 'Data shift berhasil ditambahkan');
}


    // Delete
    public function delete($id)
    {
        $m_shift = new Shiftmasuk_Model();

        // Ambil detail dulu untuk hapus file
        $detail = $m_shift->detail($id);
        if ($detail && !empty($detail->foto)) {
            $path = public_path('admin/upload/shift/' . $detail->foto);
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        // Hapus record
        $m_shift->hapus(['id_masuk' => $id]);

        return redirect('security/shift-masuk')
            ->with('sukses', 'Data berhasil dihapus');
    }
}
