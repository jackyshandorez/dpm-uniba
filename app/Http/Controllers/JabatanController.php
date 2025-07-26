<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use App\Models\jurusan;
use App\Models\Fakultas;
use App\Utils\TextFormat;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {

        $jabatan = Jabatan::all();
        $jurusan = Jurusan::with('fakultas')->get();

        $fakultas = Fakultas::all();
        return view('admin.data.index', compact('jabatan', 'jurusan', 'fakultas'));
    }

    public function create()
    {
        return view('admin.jabatan.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'tanggung_jawab' => 'required|string',
        ], [
        'nama_jabatan.required' => 'Nama jabatan wajib diisi.',
        'nama_jabatan.string' => 'Nama jabatan harus berupa teks.',
        'nama_jabatan.max' => 'Nama jabatan tidak boleh lebih dari 255 karakter.',
        'tanggung_jawab.required' => 'Tanggung jawab wajib diisi.',
        'tanggung_jawab.string' => 'Tanggung jawab harus berupa teks.',
        ]);

        $request->merge([
            'nama_jabatan' => TextFormat::kapitalRomawi($request->nama_jabatan)
        ]);
        Jabatan::create($request->all());


        return redirect('/manajemen/data')->with('success', $request->nama_jabatan.' berhasil ditambahkan!');
    }

    public function show(jabatan $jabatan)
    {
        //
    }

    public function edit( $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('admin.jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'tanggung_jawab' => 'required|string',
        ], [
        'nama_jabatan.required' => 'Nama jabatan wajib diisi.',
        'nama_jabatan.string' => 'Nama jabatan harus berupa teks.',
        'nama_jabatan.max' => 'Nama jabatan tidak boleh lebih dari 255 karakter.',
        'tanggung_jawab.required' => 'Tanggung jawab wajib diisi.',
        'tanggung_jawab.string' => 'Tanggung jawab harus berupa teks.',
        ]);

        $request->merge([
            'nama_jabatan' => TextFormat::kapitalRomawi($request->nama_jabatan)
        ]);
        $jabatan = Jabatan::findOrFail($id);

        // Update data jabatan
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->tanggung_jawab = $request->tanggung_jawab;

        // Simpan perubahan
        $jabatan->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect('/manajemen/data')->with('success', $request->nama_jabatan.' berhasil diperbarui!');
    }

    public function destroy( $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect('/manajemen/data')->with('success', $jabatan->nama_jabatan.' berhasil dihapus');
    }
}
