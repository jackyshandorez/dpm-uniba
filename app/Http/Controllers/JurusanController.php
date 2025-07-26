<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Fakultas;
use App\Utils\TextFormat;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jurusan = Jurusan::with('fakultas')->get();
            foreach ($jurusan as $item) {
        $item->nama = $item->nama; // <-- ini tidak masalah jika kolom asli memang bernama 'nama'
    }

        return view('admin.jurusan.index', compact('jurusan'));
    }
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('admin.jurusan.tambah', compact( 'fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:jurusan,kode|alpha_num|max:4', // Hanya huruf dan angka
            'nama' => 'required',
            'fakultas_id' => 'required|exists:fakultas,id', // Pastikan fakultas_id valid
        ], [
        'kode.required' => 'Kode jurusan wajib diisi.',
        'kode.unique' => 'Kode jurusan sudah digunakan.',
        'kode.alpha_num' => 'Kode hanya boleh terdiri dari huruf dan angka.',
        'kode.max' => 'Kode maksimal 4 karakter.',
        'nama.required' => 'Nama jurusan wajib diisi.',
        'fakultas_id.required' => 'Fakultas wajib dipilih.',
        'fakultas_id.exists' => 'Fakultas yang dipilih tidak valid.',
        ]);
        $request->merge([
            'nama' => TextFormat::kapitalRomawi($request->nama)
        ]);
        Jurusan::create([
            'kode' => $request->kode,
            'nama' => TextFormat::kapitalRomawi($request->nama),
            'fakultas_id' => $request->fakultas_id,
        ]);
        return redirect('/manajemen/data')->with('success', $request->nama.' berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $fakultas = Fakultas::all();
        return view('admin.jurusan.edit', compact('jurusan', 'fakultas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => [
                'required',
                'alpha_num',
            ],
            'nama' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        $request->merge([
            'kode' => $request->kode,
            'nama' => TextFormat::kapitalRomawi($request->nama)
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update([
            'kode' => $request->kode,
            'nama' => TextFormat::kapitalRomawi($request->nama),
            'fakultas_id' => $request->fakultas_id
        ]);

        return redirect('/manajemen/data')->with('success', $request->nama.' berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect('/manajemen/data')->with('success', 'Jurusan berhasil dihapus');
    }


}
