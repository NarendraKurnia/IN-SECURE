<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Security\UserController;

Route::get('/', function () {
    return view('index'); 
})->name('home');

// user
Route::get('security/user', 'App\Http\Controllers\Security\UserController@index');
Route::get('security/user/tambah', 'App\Http\Controllers\Security\UserController@tambah');
Route::post('security/user/proses-tambah', 'App\Http\Controllers\Security\UserController@proses_tambah');
Route::get('security/user/edit/{id}', 'App\Http\Controllers\Security\UserController@edit');
Route::post('security/user/proses-edit', 'App\Http\Controllers\Security\UserController@proses_edit');
Route::post('security/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

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
