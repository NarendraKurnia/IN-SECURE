<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Apar_Model;
use App\Models\PemeriksaanApar_Model;
use App\Models\PemeriksaanAparDetail_Model;
use App\Models\Unit;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PemeriksaanAparController extends Controller
{
    // Index
    public function index(Request $request)
    {
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first();

        $m = new PemeriksaanApar_Model();
        $all = collect($m->listing());
        $m = new PemeriksaanApar_Model();
        $all = collect($m->with('details')->get());


        if ($request->filled('keywords')) {
            $keywords = strtolower($request->keywords);
            $all = $all->filter(function ($item) use ($keywords) {
                return str_contains(strtolower($item->nama_petugas), $keywords)
                    || str_contains(strtolower($item->tanggal_update), $keywords);
            });
        }

        $perPage = 10;
        $page = $request->get('page', 1);
        $slice = $all->slice(($page - 1) * $perPage)->values();
        $data = new LengthAwarePaginator(
            $slice,
            $all->count(),
            $perPage,
            $page,
            ['path' => url('security/pemeriksaan-apar'), 'query' => $request->query()]
        );

        return view('security/layout/wrapper', [
            'title'       => 'Pemeriksaan APAR',
            'unit'        => $unit,
            'pemeriksaan' => $data,       // <-- di sini yang penting
            'content'     => 'security/apar/index'
        ]);
    }

    // Tambah
    public function tambah()
    {
        $apars = (new Apar_Model())->listing();

        return view('security/layout/wrapper', [
            'title'   => 'Tambah Pemeriksaan APAR',
            'apars'   => $apars,
            'content' => 'security/apar/tambah'
        ]);
    }

    // Proses tambah
    public function proses_tambah(Request $request)
    {
        $request->validate([
    'nama_petugas'          => 'required|string',
    'jam_pemeriksaan'       => 'required',
    'tanggal_pemeriksaan'   => 'required|date',          // tanggal pemeriksaan wajib dan satu nilai
    'id_apar.*'             => 'required|integer',
    'masa_berlaku.*'        => 'required|date',
    'presure_gauge.*'       => 'required|in:bagus,rusak',
    'pin_segel.*'           => 'required|in:bagus,rusak',
    'selang.*'              => 'required|in:bagus,rusak',
    'klem_selang.*'         => 'required|in:bagus,rusak',
    'handle.*'              => 'required|in:bagus,rusak',
    'kondisi_fisik.*'       => 'required|in:bagus,rusak',
    'foto'                  => 'required|image|mimes:jpeg,png,jpg|max:8024',
]);

DB::transaction(function() use($request) {
    // Buat tanggal_update otomatis dengan tanggal_pemeriksaan + jam_pemeriksaan + detik
    $tanggal_update = $request->tanggal_pemeriksaan . ' ' . $request->jam_pemeriksaan . ':00';

    $master = PemeriksaanApar_Model::create([
        'nama_petugas'        => $request->nama_petugas,
        'jam_pemeriksaan'     => $request->jam_pemeriksaan,
        'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan, // wajib input user
        'tanggal_update'      => $tanggal_update,               // otomatis
        'link_reset'          => $request->link_reset ?? null,
    ]);

    // upload foto sekali
    $nama_file = null;
    if ($file = $request->file('foto')) {
        $filename  = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $nama_file = Str::slug($filename, '-') . '-' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('admin/upload/apar'), $nama_file);
    }

    // Insert detail
    foreach($request->id_apar as $i => $id_apar){
        PemeriksaanAparDetail_Model::create([
            'id_pemeriksaan' => $master->id_pemeriksaan,
            'id_apar'        => $id_apar,
            'masa_berlaku'   => $request->masa_berlaku[$i],
            'presure_gauge'  => $request->presure_gauge[$i],
            'pin_segel'      => $request->pin_segel[$i],
            'selang'         => $request->selang[$i],
            'klem_selang'    => $request->klem_selang[$i],
            'handle'         => $request->handle[$i],
            'kondisi_fisik'  => $request->kondisi_fisik[$i],
            'foto'           => $nama_file ?? null,
        ]);
    }
});


        return redirect('security/apar')
            ->with('sukses','Data pemeriksaan berhasil disimpan');
    }


    // Detail
    public function detail($id)
    {
        $master = PemeriksaanApar_Model::find($id);
        $details = (new PemeriksaanAparDetail_Model())
            ->listingByPemeriksaan($id);

        return view('security/layout/wrapper', [
            'title'   => 'Detail Pemeriksaan APAR',
            'master'  => $master,
            'details' => $details,
            'content' => 'security/apar/detail'
        ]);
    }
    // Hapus
    public function hapus($id)
    {
        DB::transaction(function() use($id){
            DB::table('pemeriksaan_apar_detail')
              ->where('id_pemeriksaan', $id)
              ->delete();

            DB::table('pemeriksaan_apar')
              ->where('id_pemeriksaan', $id)
              ->delete();
        });

        return redirect('security/apar')
            ->with('sukses','Data pemeriksaan berhasil dihapus');
    }
    // Cetak
    public function cetak($id)
    {
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first();

        // Ambil data pemeriksaan berdasarkan ID, sekaligus relasi detail
        $pemeriksaan = PemeriksaanApar_Model::with('details')->find($id);

        if (!$pemeriksaan) {
            abort(404, 'Data pemeriksaan tidak ditemukan');
        }

        // Kirim ke view cetak
        return view('security.apar.cetak', compact('pemeriksaan', 'unit'));
    }
}
