<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Pengguna;
use App\Models\Jurusan;
use App\Models\Dokumen;
use App\Models\Alumni;
use App\Models\RekrutmenForm;
use App\Models\Kontak;
use App\Models\Jabatan;
use App\Models\Organisasi;


class PageController extends Controller
{


    public function beranda()
    {
        $dokumen = Dokumen::where('status', 'publish')
                     ->orderBy('tanggal_terbit', 'desc')
                     ->take(3)
                     ->get();

        $ketua = Pengguna::where('jabatan_id', 1)->first();
        $wakilKetua = Pengguna::where('jabatan_id', 2)->first();
        $sekretaris1 = Pengguna::where('jabatan_id', 3)->first();
        $badanAnggaran1 = Pengguna::where('jabatan_id', 4)->first();

        $berita = Berita::where('status', 'publish')
                ->latest('tanggal_publish')
                ->take(3)
                ->get();

        $jurusan = Jurusan::all();
       $organisasi = Organisasi::orderBy('id')->get();
        $jumlahAnggota = Pengguna::count();
        $jumlahAlumni = Alumni::count();
        $jumlahDokumen = Dokumen::count();
        $jumlahBerita = Berita::count();
        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('pages.layout.home', compact('dokumen', 'ketua', 'wakilKetua', 'sekretaris1', 'badanAnggaran1', 'berita', 'jurusan', 'organisasi',         'jumlahAnggota',
        'jumlahAlumni',
        'jumlahDokumen',
        'jumlahBerita', 'beritaTerbaru'));
    }

    // Profil DPM
    public function tentang()
    {
        return view('pages.profil.tentang');
    }

    public function strukturdpm()
    {
        $jabatans = Jabatan::orderBy('nama_jabatan')->get();
        return view('pages.profil.struktur-dpm', compact('jabatans'));
    }

    // Anggota
    public function daftarAnggota()
    {
        $ketua = Pengguna::whereHas('jabatan', fn($q) => $q->where('nama_jabatan', 'ketua'))->with(['jabatan', 'jurusan'])->first();
        $wakilKetua = Pengguna::whereHas('jabatan', fn($q) => $q->where('nama_jabatan', 'Wakil Ketua'))->with(['jabatan', 'jurusan'])->first();

        $sekretaris1 = Pengguna::whereHas('jabatan', fn($q) => $q->where('nama_jabatan', 'sekretaris jendral i'))->with(['jabatan', 'jurusan'])->first();
        $sekretaris2 = Pengguna::whereHas('jabatan', fn($q) => $q->where('nama_jabatan', 'sekretaris jendral ii'))->with(['jabatan', 'jurusan'])->first();

        $badanAnggaran1 = Pengguna::whereHas('jabatan', fn($q) => $q->where('nama_jabatan', 'badan anggaran i'))->with(['jabatan', 'jurusan'])->first();
        $badanAnggaran2 = Pengguna::whereHas('jabatan', fn($q) => $q->where('nama_jabatan', 'badan anggaran ii'))->with(['jabatan', 'jurusan'])->first();

        $ketuaKomisi = Pengguna::whereHas('jabatan', function ($query) {
            $query->where('nama_jabatan', 'LIKE', 'Ketua Komisi%');
        })->with(['jabatan', 'jurusan'])->get();

        // Ambil daftar bidang komisi, misalnya: "Komisi I Legislasi"
        $penggunaBidang = Pengguna::whereHas('jabatan', function ($query) {
            $query->where('nama_jabatan', 'like', 'Komisi% %'); // format: Komis X [Bidang]
        })->with(['jabatan', 'jurusan'])->get();

        $groupedKetua = $ketuaKomisi->groupBy(function($item) {
        // ambil bagian 'Komisi I' dari 'Ketua Komisi I'
        return preg_replace('/Ketua\s*/', '', $item->jabatan->nama_jabatan);
        });

        // Group anggota komisi juga berdasarkan "Komisi X" dari nama_jabatan
        $groupedAnggota = $penggunaBidang->groupBy(function($item) {
            // asumsikan format 'Komisi I Legislasi' => ambil 'Komisi I'
            preg_match('/Komisi\s+\w+/', $item->jabatan->nama_jabatan, $matches);
            return $matches[0] ?? 'Lainnya';
        });

        // Gabungkan group ketua + anggota berdasarkan nama komisi
        $dataGabungan = [];

        foreach ($groupedKetua as $komisi => $ketuaItems) {
            $dataGabungan[$komisi] = [
                'ketua' => $ketuaItems,
                'anggota' => $groupedAnggota[$komisi] ?? collect(),
            ];
        }

        // Jika ada komisi anggota yang ketuanya tidak ada, tetap tampilkan
        foreach ($groupedAnggota as $komisi => $anggotaItems) {
            if (!isset($dataGabungan[$komisi])) {
                $dataGabungan[$komisi] = [
                    'ketua' => collect(),
                    'anggota' => $anggotaItems,
                ];
            }
        }


        return view('pages.anggota.anggota', compact(
            'ketua', 'wakilKetua',
            'sekretaris1', 'sekretaris2', 'badanAnggaran1', 'badanAnggaran2', 'ketuaKomisi','penggunaBidang', 'dataGabungan'
        ));
    }

    public function detailAnggota($id)
    {
        $anggota = Pengguna::with(['jabatan', 'jurusan.fakultas'])->findOrFail($id);
        return view('pages.anggota.detail-anggota', compact('anggota'));
    }


    public function alumni()
    {
        // Ambil semua data alumni sekaligus, lengkap dengan relasi 'jabatan', dan urutkan berdasarkan periode
        $alumni = Alumni::with('jabatan')->orderBy('periode', 'desc')->get();

        // Kelompokkan alumni berdasarkan 'periode'
        $alumniByPeriode = $alumni->groupBy('periode')->map(function ($group) {
            return $group->sortBy('jabatan_id');
        });

        // Kirim data ke view
        return view('pages.anggota.alumni', compact('alumniByPeriode'));
    }

    // Peraturan dan Dokumen
    public function dokumen()
    {
        $dokumen = Dokumen::where('status', 'publish')
                     ->orderBy('tanggal_terbit', 'desc')
                     ->paginate(12);
        return view('pages.dokumen.dokumen', compact('dokumen'));
    }


    public function detailDokumen()
    {

        return view('pages.dokumen.detail-dokumen');
    }

    // Berita
    public function daftarBerita()
    {
        $berita = Berita::with('kategori')
            ->where('status', 'Publish')
            ->latest()
            ->paginate(9);

        return view('pages.berita.berita', compact('berita'));
    }

    // public function detailBerita(Berita $berita)
    // {
    //     if ($berita->status !== 'Publish') {
    //         abort(404); // Jangan tampilkan jika belum dipublish
    //     }

    //     $berita->increment('views');

    //     // Ambil 5 berita lainnya yang dipublish dan tidak termasuk berita saat ini
    //     $beritaLainnya = Berita::where('status', 'Publish')
    //                         ->where('id', '!=', $berita->id)
    //                         ->latest()
    //                         ->take(5)
    //                         ->get();

    //     return view('pages.berita.detail-berita', compact('berita', 'beritaLainnya'));
    // }

    public function detailBerita(Berita $berita)
    {
        if ($berita->status !== 'Publish') {
            abort(404);
        }

        $berita->increment('views');

        // Ambil komentar dan relasinya langsung
        $berita->load(['komentars' => function ($q) {
            $q->latest();
        }, 'komentars.balasan']);

        $beritaLainnya = Berita::where('status', 'Publish')
                            ->where('id', '!=', $berita->id)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('pages.berita.detail-berita', compact('berita', 'beritaLainnya'));
    }


    // public function komentarBerita($id)
    // {
    //     $berita = Berita::with('kategori')->findOrFail($id);

    //     // Ambil komentar utama + balasannya
    //     $komentarUtama = Komentar::where('berita_id', $id)
    //         ->whereNull('parent_id')
    //         ->with(['balasan'])
    //         ->latest()
    //         ->get();

    //     return view('pages.berita.detail', compact('berita', 'komentarUtama'));
    // }


    // Aspirasi Mahasiswa
    public function formulirAspirasi()
    {
        $jurusan = Jurusan::all();

        return view('pages.aspirasi.formulir', compact('jurusan'));
    }

    public function oprek()
    {
        $forms = RekrutmenForm::with('fields')
            ->where('status', 'buka')
            // ->where('batas_akhir', '>=', now())
            ->latest()
            ->get();

        return view('pages.oprek.formulir', compact('forms'));
    }

    // pencarian
    public function cariAnggota(Request $request)
    {
        $keyword = $request->input('search-field');
        $hasil = Pengguna::where('nama', 'like', "%$keyword%")->with(['jabatan', 'jurusan'])->get();
        return view('pages.anggota.hasil', compact('hasil', 'keyword'));
    }

    public function cariAlumni(Request $request)
    {
        $keyword = $request->input('search-field');
        $hasil = Alumni::where('nama_alumni', 'like', "%$keyword%")->with('jabatan')->get();
        return view('pages.anggota.hasil-alumni', compact('hasil', 'keyword'));
    }

    public function pencarianUmum(Request $request)
    {
        $keyword = $request->input('search-field');
        return view('pages.umum.pencarian', compact('keyword'));
    }
}
