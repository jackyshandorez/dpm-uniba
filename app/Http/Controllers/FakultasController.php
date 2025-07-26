<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Utils\TextFormat;

use Illuminate\Http\Request;


class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
            foreach ($fakultas as $item) {
        $item->nama = $item->nama; // <-- ini tidak masalah jika kolom asli memang bernama 'nama'
    }
        return view('admin.fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('admin.fakultas.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);
        $request->merge([
            'nama' => TextFormat::kapitalRomawi($request->nama)
        ]);

        Fakultas::create($request->all());

        return redirect('/manajemen/data')->with('success', 'Fakultas ' . $request->nama . ' berhasil ditambahkan.');
    }

    public function show($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        return view('fakultas.show', compact('fakultas'));
    }

    public function edit($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        return view('admin.fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);
        $request->merge([
            'nama' => TextFormat::kapitalRomawi($request->nama)
        ]);


        $fakultas = Fakultas::findOrFail($id);
        $fakultas->update($request->all());

        return redirect('/manajemen/data')->with('success', 'Fakultas berhasil diperbarui.');

    }

    public function destroy($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();

        return redirect('/manajemen/data')->with('success', 'Fakultas '  .$fakultas->nama .' berhasil dihapus.');
    }




}


