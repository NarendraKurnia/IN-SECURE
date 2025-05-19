<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User_model;
use App\Models\Unit;

class UserController extends Controller
{
    // Index
    public function index(Request $request)
    {
        $query = User_model::with('unit')->orderBy('id_user', 'DESC');
        $user = $query->paginate(10); 
    
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first();
    
        $data = [ 
            'title'   => 'Data User Administrator',
            'user'    => $user,
            'unit'    => $unit,
            'content' => 'security/user/index'
        ];

        return view('security/layout/wrapper', $data);
    }
    // tambah
    public function tambah()
    {
        $unit_id = session()->get('unit_id');
        $unit = Unit::where('id_unit', $unit_id)->first();
        
        $units = Unit::select('id_unit', 'nama')->get(); // Mengambil semua unit dari database

        $data = [ 
            'title'   => 'Tambah Data User Administrator',
            'units'   => $units, 
            'unit'    => $unit,
            'content' => 'security/user/tambah'
        ];

        return view('security/layout/wrapper', $data);
    }
    // proses_tambah
    public function proses_tambah(Request $request)

    {
        $units = \App\Models\Unit::select('id_unit', 'nama')->get();
        $m_user     = new User_model();
        request()->validate([
                            'username'      => 'required|unique:users',
					        'email'         => 'required|unique:users',
					        'nama'          => 'required',
                            'password'      => 'required',
                            'unit_id' => 'required|exists:units,id_unit'
                                    ]);
        // proses data input
        $data   = [     'nama'          => $request->nama,
                        'email'	        => $request->email,
                        'username'   	=> $request->username,
                        'password'      => sha1($request->password),
                        'unit_id'       => $request->unit_id,

                    ];
        $m_user->tambah($data);
        // end proses
        return redirect('security/user')->with(['sukses' => 'Data Telah Ditambah']);
    }
    // edit
    public function edit($id_user)
    {
        $units = \App\Models\Unit::select('id_unit', 'nama')->get();
        $m_user       = new User_model();
        $user         = $m_user->detail($id_user);
        
        $data = [ 'title'      => 'Edit User Administrator',
                  'user'       => $user,
                  'units'   => $units,
                  'content'    => 'security/user/edit'
                ];
        return view('security/layout/wrapper',$data);
    }

     // proses_edit
     public function proses_edit(Request $request)

    {
         $m_user     = new User_model();
         request()->validate([
                             'username'      => 'required',
                             'email'         => 'required',
                             'nama'          => 'required',
                                     ]);
         // proses data input
         $password      = $request->password;
        //  cek panjang pendek password
        if(strlen($password) >= 6 && strlen($password) <= 32) {
            $data   = [  'id_user'       => $request->id_user,
                         'nama'          => $request->nama,
                         'email'	     => $request->email,
                         'username'   	 => $request->username,
                         'password'      => sha1($request->password),
                         'unit_id'       => $request->unit_id
 
                     ];

        }else{   
            // tidak ganti password
            $data   = [  'id_user'       => $request->id_user,
                         'nama'          => $request->nama,
                         'email'	     => $request->email,
                         'username'   	 => $request->username,
                         'unit_id'       => $request->unit_id,
 
                     ];

        }
         $m_user->edit($data);
         // end proses
         return redirect('security/user')->with(['sukses' => 'Data Telah Diedit']);
    }
     //  delete
     public function delete($id)
    {
         $m_user = new User_model();
         $data = ['id_user' => $id];
         $m_user->hapus($data);   
          
         return redirect('security/user')->with(['sukses' => 'Data Telah Dihapus']);
    }

}
