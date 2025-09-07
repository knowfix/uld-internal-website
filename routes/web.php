<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('dashboard');

Route::get('/data-mahasiswa', function () {
    return view('data-mahasiswa');
})->name('data.mahasiswa');

Route::get('/data-alumni', function () {
    return view('data-alumni');
})->name('data.alumni');

use App\Http\Controllers\MahasiswaController;

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::get('/mahasiswa/{id}/download', [MahasiswaController::class, 'download'])->name('mahasiswa.download');
Route::get('/mahasiswa/{id}/download', [MahasiswaController::class, 'download'])
    ->middleware('auth') // biar aman, hanya user login
    ->name('mahasiswa.download');
