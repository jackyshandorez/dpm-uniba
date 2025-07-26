<?php

namespace App\Http\Controllers;

use App\Models\dokumen as Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DokumenController extends Controller
{
    public function index()
    {
        $dokumen = Dokumen::all();
        $a = Dokumen::where('status', 'publish')->orderBy('tanggal_terbit', 'desc')->get();
        return view('admin.dokumen.index', compact('dokumen', 'a'));
    }

    public function show($slug)
    {
        $dokumen = Dokumen::where('slug', $slug)->firstOrFail();
        return view('admin.dokumen.show', compact('dokumen'));
    }

    public function create()
    {
        return view('admin.dokumen.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'penulis' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file' => 'required|mimes:pdf,docx,doc|max:5120',
            'tanggal_terbit' => 'required|date',
            'status' => 'required|in:draft,publish', // Sesuaikan status
        ]);

        $gambarPath = null;
        $filePath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store(Dokumen::GAMBAR_PATH, 'public');
        }

        if ($request->hasFile('file')) {
            // Menggunakan nama judul untuk file yang disimpan, dengan ekstensi file yang sesuai
            $fileExtension = $request->file('file')->getClientOriginalExtension(); // Mendapatkan ekstensi file
            $fileName = Str::slug($request->judul) . '.' . $fileExtension; // Nama file berdasarkan judul dokumen
            $filePath = $request->file('file')->storeAs(Dokumen::FILE_PATH, $fileName, 'public');// Menyimpan file dengan nama baru
        }




        // Slug unik
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $count = 1;

        while (Dokumen::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        Dokumen::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'deskripsi' => $request->deskripsi,
            'penulis' => $request->penulis,
            'gambar' => $gambarPath,
            'file' => $filePath,
            'tanggal_terbit' => $request->tanggal_terbit,
            'status' => $request->status, // Sesuaikan status
        ]);

        return redirect('/laporan/dokumen')->with('success', 'Dokumen berhasil disimpan');
    }

    public function edit($id)
    {
        $dokumen = Dokumen::findOrFail($id); // Mencari dokumen berdasarkan ID
        return view('admin.dokumen.edit', compact('dokumen')); // Menampilkan halaman edit dokumen
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'penulis' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'nullable|mimes:pdf,docx,doc,xlsx|max:10240',
            'status' => 'required|in:draft,publish',
        ]);

        // Ambil data dokumen yang akan diupdate
        $dokumen = Dokumen::findOrFail($id);

        // Update data dokumen
        $dokumen->judul = $request->judul;
        $dokumen->deskripsi = $request->deskripsi;
        $dokumen->penulis = $request->penulis;
        $dokumen->tanggal_terbit = $request->tanggal_terbit;
        $dokumen->status = $request->status;


        // Hapus gambar lama jika ada
        if ($request->hasFile('gambar') && $dokumen->gambar) {
            Storage::disk('public')->delete($dokumen->gambar);
            $dokumen->gambar = $request->file('gambar')->store(Dokumen::GAMBAR_PATH, 'public');
        }

        // Hapus file lama jika ada
        if ($request->hasFile('file')) {
            if ($dokumen->file) {
                Storage::disk('public')->delete($dokumen->file);
            }

            $fileExtension = $request->file('file')->getClientOriginalExtension();
            $fileName = Str::slug($request->judul) . '.' . $fileExtension;
            $dokumen->file = $request->file('file')->storeAs(Dokumen::FILE_PATH, $fileName, 'public');
        }

        // Simpan perubahan
        $dokumen->save();

        // Redirect ke halaman dokumen setelah update
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui');
    }




    public function destroy( $id)
    {
        $dokumen = Dokumen::findOrFail($id);
        // Hapus file dari storage jika ada
        if ($dokumen->gambar) {
            Storage::disk('public')->delete($dokumen->gambar);
        }

        if ($dokumen->file) {
            Storage::disk('public')->delete($dokumen->file);
        }
        $dokumen->delete();

        return redirect('/laporan/dokumen')->with('success', 'dokumen berhasil dihapus');
    }

}
