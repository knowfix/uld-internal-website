<?php

use App\Http\Controllers\AlumniController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Models\Alumni;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');  
Route::post('/', [LoginController::class, 'login']);  

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    
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
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
    
    // ROUTE ALUMNI
    Route::post('/mahasiswa/alumni', [MahasiswaController::class, 'jadikanAlumni'])
    ->name('mahasiswa.jadikanAlumni');
    
    // Tambahkan ini
    Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
    Route::delete('/alumni/bulk-delete', [AlumniController::class, 'bulkDelete'])
    ->name('alumni.bulkDelete');
    Route::get('/alumni/create', [AlumniController::class, 'create'])->name('alumni.create');
    Route::post('/alumni', [AlumniController::class, 'store'])->name('alumni.store');
    Route::get('/alumni/{id}/pdf', [AlumniController::class, 'generatePdf'])
    ->name('alumni.pdf');
    Route::get('/alumni/{id}/pdf/download', [AlumniController::class, 'downloadPdf'])
    // ->middleware('auth') // opsional, biar aman hanya user login
    ->name('alumni.downloadPdf');
    
    // Form edit
    Route::get('/alumni/{id}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
    
    // Proses update and delete
    Route::put('/alumni/{id}', [AlumniController::class, 'update'])->name('alumni.update');
    Route::get('/alumni/{id}', [AlumniController::class, 'show'])->name('alumni.show');
});

