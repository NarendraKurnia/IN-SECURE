<?php

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Security\BeritaController;
use App\Http\Controllers\Security\DashboardController;
use App\Http\Controllers\Security\ShiftmasukController;
use App\Http\Controllers\Security\ShiftselesaiController;
use App\Http\Controllers\Security\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Security\UserController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/berita/{id}', [HomeController::class, 'detailBerita'])->name('berita.detail');

//halaman login
Route::get('security/login', 'App\Http\Controllers\Security\LoginController@index')->name('security.login');
Route::get('security/lupa-password', 'App\Http\Controllers\Security\LoginController@lupa_password')->name('security.lupa_password');
Route::post('security/cek-login', 'App\Http\Controllers\Security\LoginController@cek_login')->name('security.cek_login');
Route::get('security/logout', 'App\Http\Controllers\Security\LoginController@logout')->name('security.logout');


// Dashboard
Route::get('security/dashboard', [DashboardController::class, 'index']);
Route::get('api/security/dashboard', [DashboardController::class, 'apiData']);

// user
Route::get('security/user', 'App\Http\Controllers\Security\UserController@index');
Route::get('security/user/tambah', 'App\Http\Controllers\Security\UserController@tambah');
Route::post('security/user/proses-tambah', 'App\Http\Controllers\Security\UserController@proses_tambah');
Route::get('security/user/edit/{id}', 'App\Http\Controllers\Security\UserController@edit');
Route::post('security/user/proses-edit', 'App\Http\Controllers\Security\UserController@proses_edit');
Route::post('security/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

// Berita
Route::get('security/berita', 'App\Http\Controllers\Security\BeritaController@index')->name('berita.index');
Route::get('security/berita/tambah', 'App\Http\Controllers\Security\BeritaController@tambah')->name('berita.tambah');
Route::post('security/berita/proses-tambah', 'App\Http\Controllers\Security\BeritaController@proses_tambah')->name('berita.proses_tambah');
Route::get('security/berita/edit/{id}', 'App\Http\Controllers\Security\BeritaController@edit')->name('berita.edit');
Route::post('security/berita/proses-edit', 'App\Http\Controllers\Security\BeritaController@proses_edit')->name('berita.proses_edit');
Route::post('security/berita/delete/{id}', [BeritaController::class, 'delete'])->name('berita.delete');

// Masuk Shift
Route::get('security/shift-masuk', 'App\Http\Controllers\Security\ShiftmasukController@index')->name('shift-masuk.index');
Route::get('security/shift-masuk/tambah', 'App\Http\Controllers\Security\ShiftmasukController@tambah')->name('shift-masuk.tambah');
Route::post('security/shift-masuk/proses-tambah', 'App\Http\Controllers\Security\ShiftmasukController@proses_tambah')->name('shift-masuk.proses_tambah');
Route::post('security/shift-masuk/delete/{id}', [ShiftmasukController::class, 'delete'])->name('shift-masuk.delete');
Route::get('/shift-masuk/cetak/{id}', [ShiftmasukController::class, 'cetak'])->name('shiftmasuk.cetak');


// Selesai Shift
Route::get('security/shift-selesai', 'App\Http\Controllers\Security\ShiftselesaiController@index')->name('shift-selesai.index');
Route::get('security/shift-selesai/tambah', 'App\Http\Controllers\Security\ShiftselesaiController@tambah')->name('shift-selesai.tambah');
Route::post('security/shift-selesai/proses-tambah', 'App\Http\Controllers\Security\ShiftselesaiController@proses_tambah')->name('shift-selesai.proses_tambah');
Route::post('security/shift-selesai/delete/{id}', [ShiftselesaiController::class, 'delete'])->name('shift-selesai.delete');
Route::get('security/shift-selesai/cetak/{id}', [ShiftselesaiController::class, 'cetak'])->name('shift-selesai.cetak');

//halaman security
Route::get('/security', function () {
    return view('security.index');
})->name('security.index');
// daily-security
Route::get('/security/daily-security', function () {
    return view('security/daily-security.index');
})->name('security/daily-security.index');

Route::get('/security/daily-security/laporan', function () {
    return view('security/daily-security.laporan');
})->name('security/daily-security.laporan');

// Berita
Route::get('/berita', function () {
    return view('berita.index');
})->name('berita.index');
