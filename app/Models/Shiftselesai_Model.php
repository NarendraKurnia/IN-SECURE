<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shiftselesai_Model extends Model
{
    //listing
    public function listing()
    {
        $query = DB::table('shift_selesai')
            ->select('*')
            ->orderBy('id_selesai','DESC')
            ->get();
        return $query;
    }
    // tambah 
    public function tambah ($data)
    {
        DB::table('shift_selesai')->insert($data);
    }
    // detail
    public function detail($id_selesai)
    {
        $query = DB::table('shift_selesai')
            ->select('*')
            ->where('id_selesai', $id_selesai)
            ->orderBy('id_selesai','DESC')
            ->first();
        return $query;
    }
    // hapus
    public function hapus ($data)
    {
        DB::table('shift_selesai')
            ->where('id_selesai',$data['id_selesai'])
            ->delete();
    }
    
}
