<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenggunaExport;
use App\Exports\RekapPanitiaExport;

Route::get('/pengguna/export/excel', function () {
    return Excel::download(new PenggunaExport, 'Anggota DPM 2025-2026.xlsx');
})->name('pengguna.export.excel');

Route::get('/panitia/export', function () {
    return Excel::download(new RekapPanitiaExport, 'rekap_panitia.xlsx');
})->name('panitia.export');
