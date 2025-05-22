<?php
// app/Models/PemeriksaanApar_Model.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PemeriksaanApar_Model extends Model
{
    protected $table = 'pemeriksaan_apar';
    protected $primaryKey = 'id_pemeriksaan';
    public $timestamps = false;
    protected $fillable = [
      'nama_petugas','jam_pemeriksaan','tanggal_update','link_reset'
    ];

    // app/Models/PemeriksaanApar_Model.php

public function listing()
{
    return self::with(['detail_apar.apar'])
        ->orderBy('tanggal_update', 'desc')
        ->get();
}

public function detail_apar()
{
    return $this->hasMany(\App\Models\PemeriksaanAparDetail_Model::class, 'id_pemeriksaan');
}

}
