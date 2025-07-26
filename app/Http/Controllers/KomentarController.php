<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KomentarController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'isi_komentar' => 'required',
            'berita_id' => 'required|exists:berita,id',
            'parent_id' => 'nullable|exists:komentars,id',
        ]);

        Komentar::create([
            'berita_id' => $request->berita_id,
            'public_user_id' => Session::get('public_user_id'),
            'isi_komentar' => $request->isi_komentar,
            'parent_id' => $request->parent_id,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }

    public function show($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);

        // Ambil komentar utama + balasannya
        $komentarUtama = Komentar::where('berita_id', $id)
            ->whereNull('parent_id')
            ->with(['balasan'])
            ->latest()
            ->get();

        return view('pages.berita.detail', compact('berita', 'komentarUtama'));
    }
}
