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