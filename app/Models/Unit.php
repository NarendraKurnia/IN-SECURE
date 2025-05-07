<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    //
    protected $table = 'units'; // Nama tabel di database
    protected $primaryKey = 'id_unit'; // Tentukan primary key yang benar
    public $incrementing = true; // Jika `id_unit` bukan auto-increment
    protected $keyType = 'int'; // Pastikan tipe data sesuai dengan di database

    protected $fillable = ['nama'];
    
}
