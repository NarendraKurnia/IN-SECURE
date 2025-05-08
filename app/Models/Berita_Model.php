<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Berita_model extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $fillable = ['judul', 'isi', 'gambar', 'unit_id', 'views', 'tanggal_update'];
    protected $primaryKey = 'id_berita';

    const UPDATED_AT = 'tanggal_update';
    const CREATED_AT = null; 

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id_unit');
    }
    //listing
    public function listing()
    {
        $query = DB::table('berita')
            ->select('*')
            ->orderBy('id_berita','DESC')
            ->get();
        return $query;
    }
    // tambah 
    public function tambah ($data)
    {
        DB::table('berita')->insert($data);
    }
    // detail
    public function detail($id_berita)
    {
        $query = DB::table('berita')
            ->select('*')
            ->where('id_berita', $id_berita)
            ->orderBy('id_berita','DESC')
            ->first();
        return $query;
    }
    // edit 
    public function edit ($data)
    {
        DB::table('berita')
            ->where('id_berita',$data['id_berita'])
            ->update($data);
    }
    // hapus
    public function hapus ($data)
    {
        DB::table('berita')
            ->where('id_berita',$data['id_berita'])
            ->delete();
    }
}
