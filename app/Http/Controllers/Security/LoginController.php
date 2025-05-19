<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User_model;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
     public function index()
    {
        $data = [
            'title'   => 'Login Administrator',
            'content' => 'security/login/index'
        ];
        return view('security/login/layout', $data);
    }

    /**
     * Proses cek login
     */
    public function cek_login(Request $request)
    {
        $m_user   = new User_model();
        $username = $request->username;
        $password = $request->password;

        // Panggil method login di model
        $user = $m_user->login($username, $password);

        if ($user) {
            // Simpan session
            $request->session()->put('id_user',   $user->id_user);
            $request->session()->put('username',  $user->username);
            $request->session()->put('nama',      $user->nama);
            $request->session()->put('unit_id',   $user->unit_id);

            return redirect('security/dashboard')->with(['sukses' => 'Anda Berhasil Login']);
        } else {
            return redirect('security/login')->with(['warning' => 'Username atau Password salah']);
        }
    }

    /**
     * Tampilkan form lupa password
     */
    public function lupa_password()
    {
        $data = [
            'title'   => 'Reset Password',
            'content' => 'admin/login/lupa_password'
        ];
        return view('admin/login/layout', $data);
    }

    /**
     * Logout user
     */
    public function logout()
    {
        Session::forget(['id_user', 'username', 'nama', 'unit_id']);
        return redirect('security/login')->with(['sukses' => 'Anda Berhasil logout']);
    }

    /**
     * Tampilkan form ganti password (profil)
     */
    public function edit()
{
    $id_user = session('id_user');
    $m_user  = new User_model();
    $user    = $m_user->detail($id_user);

    // kirim content ke login layout
    return view('admin/login/layout', [
      'title'   => 'Ganti Password',
      'user'    => $user,
    ]);
}



    /**
     * Proses ganti password
     */
    public function proses_edit(Request $request)
    {
        $request->validate([
            'old_password'              => 'required',
            'new_password'              => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required'
        ]);

        $id_user = session('id_user');
        $m_user  = new User_model();
        $user    = $m_user->detail($id_user);

        // Cek password lama (karena di model pakai sha1)
        if (sha1($request->old_password) !== $user->password) {
            return redirect()->route('akun.edit')
                             ->with(['warning' => 'Password lama tidak cocok.']);
        }

        // Update password
        $m_user->edit([
            'id_user'  => $id_user,
            'password' => sha1($request->new_password),
        ]);

        return redirect()->route('akun.edit')
                         ->with(['sukses' => 'Password berhasil diubah.']);
    }
}

