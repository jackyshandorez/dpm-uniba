<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use App\Models\Jurusan;
use App\Models\Jabatan;
use App\Utils\TextFormat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PenggunaImport;

class PenggunaController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::with(['jabatan', 'jurusan.fakultas'])
            ->orderBy('jabatan_id')
            ->get();

        return view('admin.pengguna.index', compact('pengguna'));
    }


    public function create()
    {

        $jurusan = Jurusan::with('fakultas')->get();
        $jabatan = Jabatan::orderBy('created_at', 'asc')->get();
        return view('admin.pengguna.tambah', compact('jurusan', 'jabatan'));


    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'jabatan_id' => 'required|exists:jabatan,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'angkatan' => 'required|string|max:4',
            'nik' => 'required|string|max:10|unique:pengguna,nik',
            'telepon' => 'nullable|string|max:12',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'status' => 'required|in:aktif,nonaktif',

        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 255 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',

            'nik.required' => 'NIK wajib diisi.',
            'nik.max' => 'NIK maksimal 10 karakter.',
            'nik.unique' => 'NIK sudah terdaftar.',


            'jabatan_id.required' => 'Jabatan wajib dipilih.',
            'jabatan_id.exists' => 'Silakan pilih jabatan yang valid.',

            'jurusan_id.required' => 'Jurusan wajib dipilih.',
            'jurusan_id.exists' => 'Silakan pilih jurusan yang valid.',


            'angkatan.required' => 'Angkatan wajib dipilih.',
            'angkatan.max' => 'Angkatan maksimal 4 karakter.',

            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin tidak valid.',

            'nik.max' => 'NIK maksimal 10 karakter.',
            'telepon.max' => 'Telepon maksimal 12 karakter.',

            'alamat.required' => 'Alamat wajib diisi.',

            // 'foto.required' => 'Foto wajib diunggah.',
            'foto.image' => 'File foto harus berupa gambar.',
            'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',

            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status harus aktif atau nonaktif.',
            'status.not_in' => 'Silakan pilih status yang valid.',
        ]);

        $request->merge([
            'nama' => TextFormat::kapitalRomawi($request->nama),
            'alamat' => TextFormat::kapitalRomawi($request->alamat),
        ]);


        // $fotoPath = null;
        // if ($request->hasFile('foto')) {
        //     $fotoPath = $request->file('foto')->store('foto-anggota', 'public');
        // }
        $fotoPath = ''; // default

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto-anggota', 'public');
        }

        Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan_id' => $request->jabatan_id,
            'jurusan_id' => $request->jurusan_id,
            'angkatan' => $request->angkatan,
            'nik' => $request->nik,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $fotoPath,
            'status' => $request->status,
        ]);

        return redirect()->route('pengguna.index')->with('success', $request->nama .' berhasil ditambahkan.');
    }


    public function import(Request $request)
    {
        $import = new \App\Imports\PenggunaImport();
        \Maatwebsite\Excel\Facades\Excel::import($import, $request->file('file'));

        if (!empty($import->errors)) {
            return back()->withErrors($import->errors);
        }

        return redirect()->route('pengguna.index')->with('success', '✅ Data berhasil diimpor.');
    }



    public function show( $id)
    {
        $pengguna = Pengguna::with(['jabatan', 'jurusan.fakultas'])->findOrFail($id);
        return view('admin.pengguna.show', compact('pengguna'));
    }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $jurusan = Jurusan::all();
        $jabatan = Jabatan::all();
        return view('admin.pengguna.edit', compact('pengguna', 'jurusan', 'jabatan'));
    }

    public function update(Request $request, $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jabatan_id' => 'required|exists:jabatan,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'angkatan' => 'nullable|string|max:4',
            'nik' => 'nullable|string|max:10',
            'telepon' => 'nullable|string|max:12',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'status' => 'required|string|in:aktif,nonaktif',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $request->merge([
            'nama' => TextFormat::kapitalRomawi($request->nama)
        ]);

        $data = $request->only([
            'nama', 'email', 'jabatan_id', 'jurusan_id', 'angkatan', 'nik',
            'telepon', 'alamat', 'tanggal_lahir', 'status', 'jenis_kelamin'
        ]);

        // Cek jika ada upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama kalau ada
            if (!empty($pengguna->foto) && Storage::disk('public')->exists($pengguna->foto)) {
                Storage::disk('public')->delete($pengguna->foto);
            }

            // Simpan foto baru
            $data['foto'] = $request->file('foto')->store('foto-anggota', 'public');
        }

        // Update data pengguna
        $pengguna->update($data);

        return redirect()->route('pengguna.index')->with('success', $request->nama .' berhasil diperbarui.');
    }




    public function destroy($id)
    {
        $pengguna = pengguna::findOrFail($id);
        // Hapus file foto jika ada dan bukan null
        if ($pengguna->foto && Storage::disk('public')->exists($pengguna->foto)) {
            Storage::disk('public')->delete($pengguna->foto);
        }
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success',$pengguna->nama. ' pengguna berhasil dihapus');
    }


}
