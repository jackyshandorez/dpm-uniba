<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PenggunaController, JurusanController};
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KomentarBeritaController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\Admin\OprekController;
use App\Http\Controllers\FormulirPendaftaranController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PublicLoginController;
use App\Http\Controllers\AdminController;


use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard') // Kalau sudah login
        : redirect()->route('beranda-page');     // Kalau belum login
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');         // /admin
        Route::get('/create', [AdminController::class, 'create'])->name('create'); // /admin/create
        Route::post('/', [AdminController::class, 'store'])->name('store');        // POST /admin
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');  // /admin/{id}/edit
        Route::put('/{id}', [AdminController::class, 'update'])->name('update');   // PUT /admin/{id}
        Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy'); // DELETE /admin/{id}
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Pengguna
    Route::prefix('manajemen/anggota')->name('pengguna.')->group(function() {
        Route::get('/', [PenggunaController::class, 'index'])->name('index');
        Route::get('/create', [PenggunaController::class, 'create'])->name('create');
        Route::post('/', [PenggunaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PenggunaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PenggunaController::class, 'update'])->name('update');
        Route::get('/{id}', [PenggunaController::class, 'show'])->name('show');
        Route::delete('/{id}', [PenggunaController::class, 'destroy'])->name('destroy');

        Route::post('/import', [PenggunaController::class, 'import'])->name('import');
    });

    // Alumni
    Route::prefix('manajemen/alumni')->group(function () {
        Route::get('/', [AlumniController::class, 'index'])->name('alumni.index');
        Route::get('/tambah', [AlumniController::class, 'create'])->name('alumni.create');
        Route::post('/tambah', [AlumniController::class, 'store'])->name('alumni.store');
        Route::get('/{id}', [AlumniController::class, 'show'])->name('alumni.show');
        Route::get('/{id}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
        Route::put('/{id}', [AlumniController::class, 'update'])->name('alumni.update');
        Route::delete('/{id}', [AlumniController::class, 'destroy'])->name('alumni.destroy');
    });

    // Fakultas
    Route::prefix('manajemen')->name('fakultas.')->group(function () {
        Route::get('/data', [DataController::class, 'index'])->name('index');
        Route::get('/fakultas/create', [FakultasController::class, 'create'])->name('create');
        Route::post('/fakultas', [FakultasController::class, 'store'])->name('store');
        Route::get('/fakultas/{id}/edit', [FakultasController::class, 'edit'])->name('edit');
        Route::put('/fakultas/{id}', [FakultasController::class, 'update'])->name('update');
        Route::delete('/fakultas/{id}', [FakultasController::class, 'destroy'])->name('destroy');
    });

    // Jurusan
    Route::get('manajemen/data', [DataController::class, 'index'])->name('jurusan.index');
    Route::prefix('manajemen/jurusan')->group(function () {
        Route::get('tambah_jurusan', [JurusanController::class, 'create'])->name('jurusan.create');
        Route::post('tambah_jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
        Route::get('{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
        Route::put('{id}', [JurusanController::class, 'update'])->name('jurusan.update');
        Route::delete('{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');
    });

    // jabatan
    Route::prefix('manajemen')->group(function () {
        Route::get('tambah_jabatan', [JabatanController::class, 'create'])->name('jabatan.create');
        Route::post('tambah_jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
        Route::get('jabatan/{id}/edit', [JabatanController::class, 'edit'])->name('jabatan.edit');
        Route::put('jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
        Route::delete('jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
    });

    //Surat
    Route::prefix('surat')->name('surat.')->group(function () {
        Route::resource('masuk', SuratMasukController::class)->parameters([
        'masuk' => 'id'
        ]);
        Route::resource('keluar', SuratKeluarController::class)->parameters([
        'keluar' => 'id'
        ]);
    });

    // Dokumen
    Route::get('/laporan/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/laporan/dokumen/tambah-dokumen', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::post('/laporan/dokumen/tambah-dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::get('/laporan/dokumen/{slug}', [DokumenController::class, 'show'])->name('dokumen.show');
    Route::get('/laporan/dokumen/edit/{id}', [DokumenController::class, 'edit'])->name('dokumen.edit');
    Route::put('/laporan/dokumen/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/{id}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');

    // Oprek
    Route::prefix('admin/oprek')->name('oprek.')->group(function () {
        Route::get('/', [OprekController::class, 'index'])->name('index');
        Route::get('/create', [OprekController::class, 'create'])->name('create');
        Route::post('/', [OprekController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [OprekController::class, 'edit'])->name('edit');
        Route::patch('/{id}/toggle', [OprekController::class, 'toggleStatus'])->name('toggleStatus');
        Route::put('/{id}', [OprekController::class, 'update'])->name('update');
        Route::delete('/{id}', [OprekController::class, 'destroy'])->name('destroy');
        Route::get('/form/{id}', [OprekController::class, 'show'])->name('show');
    });

    //Pendaftaran OPREK
    Route::post('/pendaftaran', [FormulirPendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/admin/pendaftaran', [FormulirPendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::get('/admin/formulir/{id}/pendaftar', [FormulirPendaftaranController::class, 'pendaftar'])->name('formulir.pendaftar');
    Route::get('/admin/pendaftar/{id}', [FormulirPendaftaranController::class, 'show'])->name('pendaftar.show');

    Route::put('/pendaftar/{id}/status', [FormulirPendaftaranController::class, 'updateStatus'])->name('pendaftar.updateStatus');
    Route::get('pendaftar/{form}/diterima', [FormulirPendaftaranController::class, 'diterima'])->name('pendaftar.diterima');
    Route::get('/admin/diterima', [FormulirPendaftaranController::class, 'indexterima'])->name('pendaftaran.index-terima');


    // Devisi
    Route::prefix('admin')->name('devisi.')->group(function () {
        Route::get('/devisi', [DevisiController::class, 'index'])->name('index');
        Route::get('/devisi/tambah', [DevisiController::class, 'create'])->name('create');
        Route::post('/devisi', [DevisiController::class, 'store'])->name('store');
        Route::get('/devisi/{id}/edit', [DevisiController::class, 'edit'])->name('edit');
        Route::put('/devisi/{id}', [DevisiController::class, 'update'])->name('update');
        Route::delete('/devisi/{id}', [DevisiController::class, 'destroy'])->name('destroy');
        // Route::get('/devisi/{id}', [DevisiController::class, 'show'])->name('show');
    });

    // devisi
    Route::get('/admin/devisi/assign', [DevisiController::class, 'formAssign'])->name('devisi.assign.form');
    Route::post('/admin/devisi/assign', [DevisiController::class, 'assign'])->name('devisi.assign');

    Route::prefix('admin')->group(function () {
        Route::get('/panitia/internal', [PanitiaController::class, 'indexInternal'])->name('panitia.internal.index');
        Route::post('/panitia', [PanitiaController::class, 'store'])->name('panitia.store');
        Route::put('/panitia/{id}', [PanitiaController::class, 'update'])->name('panitia.update');
        Route::delete('/panitia/{id}', [PanitiaController::class, 'destroy'])->name('panitia.destroy');
    });

    // Agenda
    Route::get('/agenda', [AgendaController::class, 'index']);
    Route::get('/tambah_agenda', [AgendaController::class, 'create']);
    Route::post('/tambah_agenda', [AgendaController::class, 'store']);
    Route::get('/agenda/{id}/edit', [AgendaController::class, 'edit']);
    Route::put('/agenda/{id}', [AgendaController::class, 'update']);
    Route::delete('/agenda/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');

    Route::prefix('berita/kategori_berita')->group(function () {
        Route::get('/', [KategoriBeritaController::class, 'index'])->name('kategori_berita.index');
        Route::get('create', [KategoriBeritaController::class, 'create'])->name('kategori_berita.create');
        Route::post('store', [KategoriBeritaController::class, 'store'])->name('kategori_berita.store');
        Route::get('{id}/edit', [KategoriBeritaController::class, 'edit'])->name('kategori_berita.edit');
        Route::put('{id}', [KategoriBeritaController::class, 'update'])->name('kategori_berita.update');
        Route::delete('{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori_berita.destroy');
    });

    // Berita
    Route::get('/daftar_berita', [BeritaController::class, 'index']);
    Route::get('/tambah_berita', [BeritaController::class, 'create']);
    Route::post('/tambah_berita', [BeritaController::class, 'store']);
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::get('/berita/{id}/lihat', [BeritaController::class, 'show'])->name('berita.show');
    // Route::get('/admin/berita/{id}/lihat', [BeritaController::class, 'adminShow'])->name('admin.berita.show');
    Route::put('/berita/{id}', [BeritaController::class, 'update']);
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // Aspirasi
    Route::prefix('aspirasi')->name('aspirasi.')->group(function () {
        Route::get('/', [AspirasiController::class, 'index'])->name('index');
        Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('store');
        Route::get('/{id}', [AspirasiController::class, 'show'])->name('show');
        Route::delete('/{id}', [AspirasiController::class, 'destroy'])->name('destroy');
    });

    // Kontak
    Route::prefix('admin/kontak')->name('kontak.')->group(function () {
        Route::get('/', [KontakController::class, 'index'])->name('index');
        Route::get('/create', [KontakController::class, 'create'])->name('create');
        Route::get('/edit', [KontakController::class, 'edit'])->name('edit');
        Route::put('/update', [KontakController::class, 'update'])->name('update');
    });

    Route::prefix('organisasi')->name('organisasi.')->group(function () {
        Route::get('/', [OrganisasiController::class, 'index'])->name('index');
        Route::get('/create', [OrganisasiController::class, 'create'])->name('create');
        Route::post('/store', [OrganisasiController::class, 'store'])->name('store');
        Route::get('/{id}', [OrganisasiController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [OrganisasiController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [OrganisasiController::class, 'update'])->name('update');
        Route::delete('/{id}', [OrganisasiController::class, 'destroy'])->name('destroy');
    });

});


Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
Route::get('/notifikasi/baca/{id}', [NotifikasiController::class, 'tandaiDibaca'])->name('notifikasi.baca');
Route::get('/notifikasi/baca-semua', [NotifikasiController::class, 'bacaSemua'])->name('notifikasi.baca-semua');

// login publik
Route::get('/login-publik', [PublicLoginController::class, 'form']);
Route::post('/login-publik', [PublicLoginController::class, 'sendOtp']);
Route::post('/verifikasi-otp', [PublicLoginController::class, 'verifyOtp']);
Route::post('/logout-publik', [PublicLoginController::class, 'logout']);

Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
require __DIR__.'/auth.php';


