<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
public function index()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.index', compact('kontak'));
    }

    public function edit()
    {
        $kontak = Kontak::first();
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'whatsapp' => 'required|string|max:20',
            'lokasi' => 'nullable|string|max:255',
            'link_facebook' => 'nullable|url',
            'link_instagram' => 'nullable|url',
            'link_youtube' => 'nullable|url',
        ]);

        $kontak = Kontak::first();
        $kontak->update($request->all());

        return redirect()->route('kontak.index')->with('success', 'Kontak berhasil diperbarui.');
    }
}
