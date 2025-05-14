<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Berita_model;
use App\Models\Unit;

class HomeController extends Controller
{
     // Home
     public function home(Request $request)
     {
         // Ambil data berita untuk daftar halaman (paginate)
         $berita = Berita_model::with('unit')
             ->orderBy('id_berita', 'DESC')
             ->paginate(5, ['*'], 'berita_page');
 
         // Ambil semua berita terbaru (tanpa paginate) untuk carousel slide
         $allBerita = Berita_model::with('unit')
             ->orderBy('id_berita', 'DESC')
             ->get(); 
 
         // Kirim semua data ke view
         return view('index', [
             'title'     => 'Ruang Kita',
             'berita'    => $berita,
             'allBerita' => $allBerita,
         ]);
     }
     
     public function detailBerita($id)
    {
        $berita = Berita_model::with('unit')
                   ->where('id_berita', $id)
                   ->firstOrFail();

        $berita_terkini = Berita_model::with('unit')
            ->where('id_berita', '!=', $id)
            ->orderBy('id_berita', 'DESC')
            ->take(4)
            ->get();

        $key = 'berita_viewed_' . $berita->id_berita;
        if (!session()->has($key)) {
            $berita->increment('views');
            session()->put($key, true);
        }

        return view('berita.detail', [
            'berita'            => $berita,
            'berita_terkini'    => $berita_terkini,
            'title'             => $berita->judul
        ]);
    }
}
