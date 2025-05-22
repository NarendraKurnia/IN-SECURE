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
use DB;

class PemeriksaanAparController extends Controller
{
    public function index(Request $request)
{
    $unit_id = session()->get('unit_id');
    $unit = Unit::where('id_unit', $unit_id)->first();

    $m = new PemeriksaanApar_Model();
    $all = collect($m->listing());

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


    public function tambah()
{
    $apars = (new Apar_Model())->listing();

    return view('security/layout/wrapper', [
        'title'   => 'Tambah Pemeriksaan APAR',
        'apars'   => $apars,
        'content' => 'security/apar/tambah'
    ]);
}


    public function proses_tambah(Request $r)
    {
        $r->validate([
            'nama_petugas'     => 'required|string',
            'jam_pemeriksaan'  => 'required',
            'tanggal_update'   => 'required|date',
            'id_apar.*'        => 'required|integer',
            'masa_berlaku.*'   => 'required|date',
            'presure_gauge.*'  => 'required|in:bagus,rusak',
            'pin_segel.*'      => 'required|in:bagus,rusak',
            'selang.*'         => 'required|in:bagus,rusak',
            'klem_selang.*'    => 'required|in:bagus,rusak',
            'handle.*'         => 'required|in:bagus,rusak',
            'kondisi_fisik.*'  => 'required|in:bagus,rusak',
        ]);

        DB::transaction(function() use($r) {
            // Gabungkan tanggal dan jam
$tanggal_update = $r->tanggal_update . ' ' . $r->jam_pemeriksaan;

$master = PemeriksaanApar_Model::create([
    'nama_petugas'         => $r->nama_petugas,
    'jam_pemeriksaan'      => $r->jam_pemeriksaan,
    'tanggal_update'       => $tanggal_update,
    'tanggal_pemeriksaan'  => $r->tanggal_update,
    'link_reset'           => $r->link_reset ?? null,
]);


            foreach($r->id_apar as $i => $id_apar){
                PemeriksaanAparDetail_Model::create([
                    'id_pemeriksaan' => $master->id_pemeriksaan,
                    'id_apar'        => $id_apar,
                    'masa_berlaku'   => $r->masa_berlaku[$i],
                    'presure_gauge'  => $r->presure_gauge[$i],
                    'pin_segel'      => $r->pin_segel[$i],
                    'selang'         => $r->selang[$i],
                    'klem_selang'    => $r->klem_selang[$i],
                    'handle'         => $r->handle[$i],
                    'kondisi_fisik'  => $r->kondisi_fisik[$i],
                ]);
            }
        });

        return redirect('security/apar')
            ->with('sukses','Data pemeriksaan berhasil disimpan');
    }

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
}
