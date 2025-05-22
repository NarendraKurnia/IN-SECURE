<?php
// app/Models/Apar_Model.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Apar_Model extends Model
{
    protected $table = 'apar';
    protected $primaryKey = 'id_apar';
    public $timestamps = false;
    protected $fillable = ['kode','lokasi','link_reset','tanggal_update'];

    public function listing()
    {
        
        return DB::table($this->table)
            ->orderBy($this->primaryKey,'ASC')
            ->get();
    }
}
