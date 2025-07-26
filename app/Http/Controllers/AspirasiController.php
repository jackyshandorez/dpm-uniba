<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use App\Models\Notifikasi;
use Illuminate\Support\Str;

class AspirasiController extends Controller
{
    // Tampilkan daftar aspirasi dengan pagination
    public function index()
    {
        $aspirasi = Aspirasi::latest()->paginate(10);
        return view('admin.aspirasi.index', compact('aspirasi'));
    }

 public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'nullable|string|max:255',
        'nim' => 'nullable|string|max:20',
        'jurusan' => 'required|string|max:255',
        'semester' => 'required|integer|min:1|max:14',
        'judul_aspirasi' => 'required|string|max:255',
        'isi_aspirasi' => 'required|string',
        'anonim' => 'nullable|boolean',
    ], [
        'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
        'nim.max' => 'NIM tidak boleh lebih dari 20 karakter.',
        'jurusan.required' => 'Jurusan wajib dipilih.',
        'jurusan.max' => 'Jurusan tidak boleh lebih dari 255 karakter.',
        'semester.required' => 'Semester wajib dipilih.',
        'judul_aspirasi.required' => 'Kategori aspirasi wajib dipilih.',
        'judul_aspirasi.max' => 'Kategori aspirasi terlalu panjang.',
        'isi_aspirasi.required' => 'Isi aspirasi wajib diisi.',
    ]);

    // Jika anonim dicentang, kosongkan nama dan nim
    if ($request->has('anonim')) {
        $validated['nama'] = null;
        $validated['nim'] = null;
        $validated['anonim'] = true;
    } else {
        $validated['anonim'] = false;
    }

    // ✅ SIMPAN ASPIRASI dan dapatkan ID-nya
    $aspirasi = Aspirasi::create($validated);

    // 🔔 BUAT NOTIFIKASI
    Notifikasi::create([
        'judul' => $validated['anonim']
        ? 'Aspirasi dari Pengguna Anonim'
        : 'Aspirasi dari ' . $validated['nama'],
        'pesan' => Str::limit($validated['isi_aspirasi'], 100),
        'tipe' => 'info',
        'dibaca' => false,
        'link' => route('aspirasi.show', $aspirasi->id), // Pastikan ada kolom 'link'
    ]);

    return redirect()->back()->with('success', 'Aspirasi berhasil dikirim.');
}



    // Tampilkan detail aspirasi
    public function show($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    // Hapus aspirasi
    public function destroy($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->delete();

        return redirect()->route('aspirasi.index')->with('success', 'Data aspirasi berhasil dihapus.');
    }
}
