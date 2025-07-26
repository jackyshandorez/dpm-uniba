<?php

namespace App\Http\Controllers;


use App\Models\KategoriBerita;
use App\Models\Berita;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Utils\TextFormat;



class KategoriBeritaController extends Controller
{
       public function index()
    {
        $kategori = KategoriBerita::latest()->get();
        return view('admin.kategori_berita.index', compact('kategori'));
    }

    public function create()
    {
        $kategori = KategoriBerita::all();
        return view('admin.kategori_berita.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori_berita,nama',
        ]);
        $request->merge([
            'nama' => TextFormat::kapitalRomawi($request->nama),
        ]);


        KategoriBerita::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);


        return redirect()->route('kategori_berita.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        return view('admin.kategori_berita.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriBerita::findOrFail($id);

        $request->validate([
            'nama' => 'required|unique:kategori_berita,nama,' . $kategori->id,
        ]);
        $request->merge([
            'nama' => TextFormat::kapitalRomawi($request->nama),
        ]);

        $kategori->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        return redirect()->route('kategori_berita.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori_berita.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
