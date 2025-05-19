<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Shiftselesai_Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Unit;
use Carbon\Carbon;

class ShiftselesaiController extends Controller
{
    // Index
    public function index(Request $request)
    {
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first();

        $m_shift = new Shiftselesai_Model();

        // Ambil semua data (collection)
        $all = collect($m_shift->listing());

        // Jika ada pencarian keywords, filter collection
        if ($request->filled('keywords')) {
            $keywords = strtolower($request->keywords);
            $all = $all->filter(function($item) use ($keywords) {
                return str_contains(strtolower($item->tanggal_shift), $keywords)
                    || str_contains(strtolower($item->nama_security_1), $keywords)
                    || str_contains(strtolower($item->nama_security_2), $keywords)
                    || str_contains(strtolower($item->nama_security_3), $keywords);
            });
        }

        // Manual paginate collection
        $perPage = 10;
        $page    = $request->get('page', 1);
        $slice   = $all->slice(($page - 1) * $perPage, $perPage)->values();
        $shift_selesai = new LengthAwarePaginator(
            $slice,
            $all->count(),
            $perPage,
            $page,
            ['path' => url('security/shift-selesai'), 'query' => $request->query()]
        );

        return view('security/layout/wrapper', [
            'title'         => 'Data Shift Selesai',
            'unit'          => $unit,
            'shift_selesai' => $shift_selesai,
            'content'       => 'security/shift-selesai/index'
        ]);
    }
    // Form tambah
    public function tambah()
    {
        return view('security/layout/wrapper', [
            'title'   => 'Selesai Shift',
            'content' => 'security/shift-selesai/tambah'
        ]);
    }

    public function proses_tambah(Request $request)
{
    $request->validate([
        'nama_security_1'        => 'required|string|max:100',
        'jam_selesai_1'          => 'required',
        'nama_security_2'        => 'required|string|max:100',
        'jam_selesai_2'          => 'required',
        'nama_security_3'        => 'nullable|string|max:100',
        'jam_selesai_3'          => 'nullable',
        'lampu'                  => 'required|in:Sudah,Belum',
        'membuka_kunci'          => 'required|in:Sudah,Belum',
        'mengunci_pintu'         => 'required|in:Sudah,Belum',
        'uraian_kegiatan'        => 'required|string',
        'catatan_shift_selanjutnya' => 'required|string',
        'shift'                  => 'required|in:Pagi,Siang,Malam',
        'foto'                   => 'required|image|mimes:jpeg,png,jpg|max:8024',
    ]);

    // Otomatisasi tanggal_shift
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
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $nama_file = \Str::slug($filename, '-') . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('admin/upload/shift-selesai'), $nama_file);
    }

    $data = [
        'nama_security_1'        => $request->nama_security_1,
        'jam_selesai_1'          => $request->jam_selesai_1,
        'nama_security_2'        => $request->nama_security_2,
        'jam_selesai_2'          => $request->jam_selesai_2,
        'nama_security_3'        => $request->nama_security_3,
        'jam_selesai_3'          => $request->jam_selesai_3,
        'lampu'                  => $request->lampu,
        'membuka_kunci'          => $request->membuka_kunci,
        'mengunci_pintu'         => $request->mengunci_pintu,
        'uraian_kegiatan'        => $request->uraian_kegiatan,
        'catatan_shift_selanjutnya' => $request->catatan_shift_selanjutnya,
        'tanggal_shift'          => $tanggal_shift,
        'shift'                  => $shift,
        'foto'                   => $nama_file,
        'tanggal_update'         => now(),
    ];

    $m_shift = new Shiftselesai_Model();
    $m_shift->tambah($data);

    return redirect('security/shift-selesai')->with('sukses', 'Data shift berhasil ditambahkan');
}
    // Delete
    public function delete($id)
    {
        $m_shift = new Shiftselesai_Model();

        // Ambil detail dulu untuk hapus file
        $detail = $m_shift->detail($id);
        if ($detail && !empty($detail->foto)) {
            $path = public_path('admin/upload/shift-selesai/' . $detail->foto);
            if (file_exists($path)) {
                @unlink($path);
            }
        }

        // Hapus record
        $m_shift->hapus(['id_selesai' => $id]);

        return redirect('security/shift-selesai')
            ->with('sukses', 'Data berhasil dihapus');
    }
    public function cetak($id)
    {
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first();

        // Ambil data shift selesai berdasarkan ID
        $m_shift_selesai = new Shiftselesai_Model();
        $shift = $m_shift_selesai->detail($id);

        if (!$shift) {
            abort(404, 'Data shift tidak ditemukan');
        }

        // Ambil semua data shift selesai
        $selesai_all = collect($m_shift_selesai->listing());

        // Urutan shift
        $shift_order = ['Pagi' => 1, 'Siang' => 2, 'Malam' => 3];

        // Proses catatan shift sebelumnya
        $current_order = $shift_order[$shift->shift] ?? null;

        if ($current_order && $current_order > 1) {
            // Shift sebelumnya di hari yang sama
            $prev_shift = array_search($current_order - 1, $shift_order);
            $prev_shift_item = $selesai_all->first(function ($s) use ($shift, $prev_shift) {
                return $s->tanggal_shift === $shift->tanggal_shift && $s->shift === $prev_shift;
            });
        } else {
            // Shift malam sebelumnya (hari sebelumnya)
            $prev_date = date('Y-m-d', strtotime($shift->tanggal_shift . ' -1 day'));
            $prev_shift_item = $selesai_all->first(function ($s) use ($prev_date) {
                return $s->tanggal_shift === $prev_date && $s->shift === 'Malam';
            });
        }

        $shift->catatan_shift_sebelumnya = $prev_shift_item->catatan_shift_selanjutnya ?? null;

        // Kirim ke view cetak
        return view('security.shift-selesai.cetak', compact('shift', 'unit'));
    }

}
