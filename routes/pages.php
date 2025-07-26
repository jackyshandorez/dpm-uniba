<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FormulirPendaftaranController;
use App\Http\Controllers\KomentarController;

// Beranda
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda-page');

// Profil DPM
Route::get('/profil/tentang-dpm', [PageController::class, 'tentang'])->name('tentang-page');
Route::get('/profil/struktur-dpm', [PageController::class, 'strukturdpm'])->name('struktur-dpm-page');

//
Route::get('/anggota/daftar', [PageController::class, 'daftarAnggota'])->name('anggota-page');
Route::get('/anggota/alumni', [PageController::class, 'alumni'])->name('alumni-page');
Route::get('/anggota/{id}', [PageController::class, 'detailAnggota'])->name('detail-anggota');

// Peraturan dan Dokumen
Route::get('/dokumen', [PageController::class, 'dokumen'])->name('dokumen-page');
Route::get('/detail/dokumen', [PageController::class, 'detailDokumen'])->name('detail-dokumen-page');

// Berita
Route::get('/berita', [PageController::class, 'daftarBerita'])->name('berita-page');
Route::get('/berita/{berita}', [PageController::class, 'detailBerita'])->name('berita-detail-page');

// Komentar Berita
// Route::post('/komentar', [komentarBeritaController::class, 'komentarBerita'])->name('komentar.store');

// Formulir Oprek
Route::get('/rekrutmen', [PageController::class, 'oprek'])->name('oprek-formulir');

// Formulir Pendaftaran
Route::get('/daftar/{id}', [FormulirPendaftaranController::class, 'showForm'])->name('pendaftaran.form');
Route::post('/daftar/{id}', [FormulirPendaftaranController::class, 'submit'])->name('pendaftaran.submit');

// Aspirasi Mahasiswa
Route::get('/formulir', [PageController::class, 'formulirAspirasi'])->name('formulir-aspirasi-page');
Route::get('/aspirasi/daftar', [PageController::class, 'daftarAspirasi'])->name('daftar-aspirasi-page');
Route::get('/aspirasi/status', [PageController::class, 'statusAspirasi'])->name('status-aspirasi-page');

// Kontak
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak-page');




