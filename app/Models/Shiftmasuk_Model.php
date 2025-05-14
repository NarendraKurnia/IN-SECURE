<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shiftmasuk_Model extends Model
{
    //use HasFactory;

    protected $table = 'shift_masuk';
    protected $primaryKey = 'id_masuk';

    const UPDATED_AT = 'tanggal_update';
    const CREATED_AT = null; 

    //listing
    public function listing()
    {
        $query = DB::table('shift_masuk')
            ->select('*')
            ->orderBy('id_masuk','DESC')
            ->get();
        return $query;
    }
}
