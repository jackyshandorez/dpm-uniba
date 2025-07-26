<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Berita;
use App\Models\KategoriBerita;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
            $berita = Berita::with('kategori')
                    ->orderBy('created_at', 'desc') // urutkan dari yang terbaru
                    ->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = KategoriBerita::all();
        return view('admin.berita.tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'kategori_id' => 'nullable|exists:kategori_berita,id',
            'tanggal_publish' => 'nullable|date',
            'status' => 'required|in:Draft,Publish',
            'thumbnail' => 'nullable|image|max:2048',
            'penulis' => 'required|string|max:255',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'kategori_id' => $request->kategori_id,
            'tanggal_publish' => $request->tanggal_publish,
            'status' => $request->status,
            'penulis' => $request->penulis,
            'views' => 0,
        ];

        // Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        Berita::create($data);

        return redirect('/daftar_berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);
        $beritaLainnya = Berita::where('id', '!=', $berita->id)
        ->orderBy('tanggal_publish', 'desc')
        ->take(5)
        ->get();
        return view('admin.berita.show', compact('berita', 'beritaLainnya'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategori = KategoriBerita::all();
        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'kategori_id' => 'nullable|exists:kategori_berita,id',
            'tanggal_publish' => 'nullable|date',
            'status' => 'required|in:Draft,Publish',
            'penulis' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $berita = Berita::findOrFail($id);
        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'konten' => $request->konten,
            'kategori_id' => $request->kategori_id,
            'tanggal_publish' => $request->tanggal_publish,
            'status' => $request->status,
            'penulis' => $request->penulis,
        ];

        // Upload thumbnail baru
        if ($request->hasFile('thumbnail')) {
            if ($berita->thumbnail) {
                Storage::disk('public')->delete($berita->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        $berita->update($data);

        return redirect('/daftar_berita')->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->thumbnail) {
            Storage::disk('public')->delete($berita->thumbnail);
        }
        $berita->delete();

        return redirect('/daftar_berita')->with('success', 'Berita berhasil dihapus.');
    }


}
