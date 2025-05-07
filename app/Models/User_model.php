<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class User_model extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['nama', 'email', 'username', 'password', 'unit_id'];

    public function unit()
    {
    return $this->belongsTo(Unit::class, 'unit_id', 'id_unit'); 
    }

    //listing
    public function listing()
    {
        $query = DB::table('users')
            ->select('*')
            ->orderBy('id_user','DESC')
            ->get();
        return $query;
    }
    // tambah 
    public function tambah ($data)
    {
        DB::table('users')->insert($data);
    }
    // detail
    public function detail($id_user)
    {
        $query = DB::table('users')
            ->select('*')
            ->where('id_user', $id_user)
            ->orderBy('id_user','DESC')
            ->first();
        return $query;
    }
    // login
    public function login($username, $password)
    {
    $query = DB::table('users')
    ->select('id_user', 'username', 'nama', 'unit_id', 'password')
    ->where('username', $username)
    ->where('password', sha1($password))
    ->first();
    return $query;
    }
    // edit 
    public function edit ($data)
    {
        DB::table('users')
            ->where('id_user',$data['id_user'])
            ->update($data);
    }
    // hapus
    public function hapus ($data)
    {
        DB::table('users')
            ->where('id_user',$data['id_user'])
            ->delete();
    }
}
