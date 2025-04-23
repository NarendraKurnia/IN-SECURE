<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index'); 
})->name('home');
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
