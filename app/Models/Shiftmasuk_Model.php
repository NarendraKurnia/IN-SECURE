<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shiftmasuk_Model extends Model
{

    //listing
    public function listing()
    {
        $query = DB::table('shift_masuk')
            ->select('*')
            ->orderBy('id_masuk','DESC')
            ->get();
        return $query;
    }
    // tambah 
    public function tambah ($data)
    {
        DB::table('shift_masuk')->insert($data);
    }
    // detail
    public function detail($id_masuk)
    {
        $query = DB::table('shift_masuk')
            ->select('*')
            ->where('id_masuk', $id_masuk)
            ->orderBy('id_masuk','DESC')
            ->first();
        return $query;
    }
    // hapus
    public function hapus ($data)
    {
        DB::table('shift_masuk')
            ->where('id_masuk',$data['id_masuk'])
            ->delete();
    }
}
