<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');  
Route::post('/', [LoginController::class, 'login']);  

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('dashboard');
    
    Route::get('/data-mahasiswa', function () {
        return view('data-mahasiswa');
    })->name('data.mahasiswa');
    
    Route::get('/data-alumni', function () {
        return view('data-alumni');
    })->name('data.alumni');
    
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    
    // Route::get('/mahasiswa/{id}/download', [MahasiswaController::class, 'download'])->name('mahasiswa.download');
    // Route::get('/mahasiswa/{id}/download', [MahasiswaController::class, 'download'])
    //     ->middleware('auth') // biar aman, hanya user login
    //     ->name('mahasiswa.download');
        

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::get('/mahasiswa/{id}/pdf', [MahasiswaController::class, 'generatePdf'])
        ->name('mahasiswa.pdf');
    Route::get('/mahasiswa/{id}/pdf/download', [MahasiswaController::class, 'downloadPdf'])
        // ->middleware('auth') // opsional, biar aman hanya user login
        ->name('mahasiswa.downloadPdf');
    
    // Form edit
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    
    // Proses update and delete
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/bulk-delete', [MahasiswaController::class, 'bulkDelete'])
        ->name('mahasiswa.bulkDelete');
});

