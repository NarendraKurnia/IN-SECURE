<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Shiftmasuk_Model;
use App\Models\Shiftselesai_Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Unit;
use Mpdf\Mpdf;
use Carbon\Carbon;

class ShiftmasukController extends Controller
{
    public function index(Request $request)
    {
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first();

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
            'title'         => 'Data Shift Masuk',
            'unit'          => $unit,
            'shift_masuk'   => $shift_masuk,
            'content'       => 'security/shift-masuk/index'
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
        'nama_security_2' => 'required|string|max:100',
        'nama_security_3' => 'nullable|string|max:100',
        'jam_kehadiran_3' => 'nullable',
        'shift'           => 'required|in:Pagi,Siang,Malam',
        'foto'            => 'required|image|mimes:jpeg,png,jpg|max:8024'
    ]);

    $now = Carbon::now();
    $jamSekarang = $now->format('H:i');

    // Penanganan tanggal shift jika shift malam di jam 00:00 - 05:59
    if ($request->shift === 'Malam' && $now->format('H') < 6) {
        $tanggal_shift = $now->copy()->subDay()->format('Y-m-d');
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

    // Ambil jam kehadiran 3 hanya jika nama security 3 diisi
    $jam_kehadiran_3 = null;
    if (!empty($request->nama_security_3)) {
        $jam_kehadiran_3 = $request->jam_kehadiran_3 ?: $jamSekarang;
    }

    $data = [
        'nama_security_1' => $request->nama_security_1,
        'jam_kehadiran_1' => $jamSekarang,
        'nama_security_2' => $request->nama_security_2,
        'jam_kehadiran_2' => $jamSekarang,
        'nama_security_3' => $request->nama_security_3,
        'jam_kehadiran_3' => $jam_kehadiran_3,
        'tanggal_shift'   => $tanggal_shift,
        'shift'           => $request->shift,
        'foto'            => $nama_file,
        'tanggal_update'  => now(),
    ];

    // Simpan ke database
    $m_shift = new Shiftmasuk_Model();
    $m_shift->tambah($data);

    return redirect('security/shift-masuk')->with('sukses', 'Data shift berhasil ditambahkan');
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
    // Fitur print
    public function cetak($id)
    {
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first();

        // Ambil satu data shift masuk berdasarkan ID
        $m_shift = new Shiftmasuk_Model();
        $shift = $m_shift->detail($id);

        if (!$shift) {
            abort(404, 'Data shift tidak ditemukan');
        }

        // Ambil semua data shift selesai
        $m_shift_selesai = new Shiftselesai_Model();
        $selesai_all = collect($m_shift_selesai->listing());

        // Urutan shift
        $shift_order = ['Pagi' => 1, 'Siang' => 2, 'Malam' => 3];

        // Proses catatan shift sebelumnya
        $current_order = $shift_order[$shift->shift] ?? null;

        if ($current_order && $current_order > 1) {
            $prev_shift = array_search($current_order - 1, $shift_order);
            $prev_shift_item = $selesai_all->first(function ($s) use ($shift, $prev_shift) {
                return $s->tanggal_shift === $shift->tanggal_shift && $s->shift === $prev_shift;
            });
        } else {
            $prev_date = date('Y-m-d', strtotime($shift->tanggal_shift . ' -1 day'));
            $prev_shift_item = $selesai_all->first(function ($s) use ($prev_date) {
                return $s->tanggal_shift === $prev_date && $s->shift === 'Malam';
            });
        }

        $shift->catatan_shift_sebelumnya = $prev_shift_item->catatan_shift_selanjutnya ?? null;

        // Kirim ke view cetak
        return view('security.shift-masuk.cetak', compact('shift', 'unit'));
    }

}
