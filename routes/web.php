<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekskul');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
Route::get('/karya', [KaryaController::class, 'index'])->name('karya');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak', [KontakController::class, 'kirim'])->name('kontak.kirim');
