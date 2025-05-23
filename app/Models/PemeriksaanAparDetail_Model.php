<?php
// app/Models/PemeriksaanAparDetail_Model.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PemeriksaanAparDetail_Model extends Model
{
    protected $table = 'pemeriksaan_apar_detail';
    public $timestamps = false;
    protected $fillable = [
      'id_pemeriksaan','id_apar','masa_berlaku',
      'presure_gauge','pin_segel','selang',
      'klem_selang','handle','kondisi_fisik', 'foto'
    ];

    public function listingByPemeriksaan($id)
    {
        return DB::table($this->table)
            ->where('id_pemeriksaan',$id)
            ->orderBy('id','ASC')
            ->get();
    }
    // app/Models/PemeriksaanAparDetail_Model.php

public function apar()
{
    return $this->belongsTo(\App\Models\Apar_Model::class, 'id_apar');
}

}
