<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Fakultas;
use App\Models\Jurusan;
use App\Models\Alumni;
use App\Models\Panitia;
use App\Models\Dokumen;
use App\Models\Aspirasi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $alumniPerPeriode =Alumni::select('periode', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('periode')
            ->orderBy('periode')
            ->pluck('jumlah', 'periode');
    $jumlahAlumni   = Alumni::count();
    $jumlahPengguna = Pengguna::count();
    $jumlahGabungan = $jumlahAlumni + $jumlahPengguna;
        return view('admin.home.dashboard', [
            'jumlahAdmin'     => User::count(),
            'jumlahMasuk'     => SuratMasuk::count(),
            'jumlahKeluar'    => SuratKeluar::count(),
            'jumlahFakultas'  => Fakultas::count(),
            'jumlahJurusan'   => Jurusan::count(),
            'jumlahAlumni'    => Alumni::count(),
            'jumlahPanitia'   => Panitia::count(),
            'jumlahDokumen'   => Dokumen::count(),
            'jumlahAspirasi'  => Aspirasi::count(),
            'jumlahLaki'      => Pengguna::where('jenis_kelamin', 'Laki-laki')->count(),
            'jumlahPerempuan' => Pengguna::where('jenis_kelamin', 'Perempuan')->count(),
            'jumlahAnggota'   => Pengguna::count(),
            'jumlahPengguna'  => Pengguna::count(),
            'alumniPerPeriode' => $alumniPerPeriode,
            'jumlahGabungan' => $jumlahGabungan,
        ]);
    }
}

