<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Shiftmasuk_Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ShiftmasukController extends Controller
{
    // Index
    public function index(Request $request)
    {
        $m_shift = new Shiftmasuk_Model();

        // Ambil semua data (collection)
        $all = collect($m_shift->listing());

        // Jika ada pencarian keywords, filter collection
        if ($request->filled('keywords')) {
            $keywords = strtolower($request->keywords);
            $all = $all->filter(function($item) use ($keywords) {
                return str_contains(strtolower($item->tanggal_update), $keywords)
                    || str_contains(strtolower($item->nama_security_1), $keywords)
                    || str_contains(strtolower($item->nama_security_2), $keywords)
                    || str_contains(strtolower($item->nama_security_3), $keywords);
            });
        }

        // Manual paginate collection
        $perPage = 10;
        $page    = $request->get('page', 1);
        $slice   = $all->slice(($page - 1) * $perPage, $perPage)->values();
        $shift_masuk = new LengthAwarePaginator(
            $slice,
            $all->count(),
            $perPage,
            $page,
            ['path' => url('security/shift-masuk'), 'query' => $request->query()]
        );

        return view('security/layout/wrapper', [
            'title'       => 'Data Shift Masuk',
            'shift_masuk' => $shift_masuk,
            'content'     => 'security/shift-masuk/index'
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
            'tanggal_shift'   => 'required|date',
            'shift'           => 'required|in:Pagi,Siang,Malam',
            'foto'            => 'required|image|mimes:jpeg,png,jpg|max:8024'
        ]);

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
            'tanggal_shift'   => $request->tanggal_shift,
            'shift'           => $request->shift,
            'foto'            => $nama_file,
            'tanggal_update'  => now(),
        ];

        // Panggil method tambah dari model
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
