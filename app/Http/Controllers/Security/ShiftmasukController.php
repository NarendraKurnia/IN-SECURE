<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Shiftmasuk_Model;


class ShiftmasukController extends Controller
{
    //Index
    public function index(Request $request)
    {
        $query = Shiftmasuk_Model::with('unit')->orderBy('id_berita', 'DESC');
        if ($request->has('keywords')) {
            $keywords = $request->keywords;
            $query->where(function($q) use ($keywords) {
                $q->where('tanggal_update', 'like', "%{$keywords}%")
                  ->orWhere('isi', 'like', "%{$keywords}%");
            });
        }

        $shift_masuk = $query->paginate(10);

        $data = [ 
            'title'         => 'Data Shift Masuk',
            'shift_masuk'   => $shift_masuk,
            'content'       => 'security/shift-masuk/index'
        ];

        return view('security/layout/wrapper', $data);
    }
}
