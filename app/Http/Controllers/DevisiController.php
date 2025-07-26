<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devisi;
use App\Models\RekrutmenSubmissionField;
use App\Models\RekrutmenSubmission;
use App\Models\RekrutmenField;
use App\Models\pengguna;

class DevisiController extends Controller
{
    public function index()
    {
        $kategoriDevisi = Devisi::all();
        return view('admin.devisi.index', compact('kategoriDevisi'));
    }

    public function create()
    {
        return view('admin.devisi.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'warna' => 'required|string|max:7', // Contoh: #FF0000
        ], [
        'nama.required' => 'Nama devisi wajib diisi.',
        'nama.string' => 'Nama devisi harus berupa teks.',
        'nama.max' => 'Nama devisi tidak boleh lebih dari :max karakter.',
        'warna.required' => 'Warna wajib dipilih.',
        'warna.string' => 'Format warna tidak valid.',
        'warna.max' => 'Kode warna terlalu panjang.',
        ]);

        Devisi::create($request->all());

        return redirect()->route('devisi.index')->with('success', $request->nama.' berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $devisi = Devisi::findOrFail($id);
        return view('admin.devisi.edit', compact('devisi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'warna' => 'required|string|max:7',
        ]);

        $devisi = Devisi::findOrFail($id);
        $devisi->update($request->all());

        return redirect()->route('devisi.index')->with('success', $devisi->nama.' berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $devisi = Devisi::findOrFail($id);
        $devisi->delete();

        return redirect()->route('devisi.index')->with('success', $devisi->nama.' berhasil dihapus.');
    }

    public function formAssign()
    {
        // Ambil semua submission_id yang statusnya Diterima
        $diterimaIds = RekrutmenSubmissionField::where('field_name', 'Status')
            ->where('value', 'Diterima')
            ->pluck('submission_id');

        // Ambil nama dari panitia internal
        $panitiaInternal = Pengguna::where('status', 'internal')->with('devisi')->get();

        // Ambil nama dari panitia eksternal

        $submissionsDiterima = RekrutmenSubmission::where('status', 'diterima')->pluck('id');

        // ambil field 'nama_lengkap' dari submission yang diterima DAN status panitia eksternal
        $panitiaEksternal = RekrutmenSubmissionField::where('field_name', 'nama_lengkap')
            ->whereIn('submission_id', function ($query) {
                $query->select('submission_id')
                    ->from('rekrutmen_submission_fields')
                    ->where('field_name', 'status')
                    ->where('value', 'diterima');
            })
            ->whereIn('submission_id', $submissionsDiterima)
            ->get();

        $devisiList = Devisi::all();
        $penggunaList = Pengguna::all();

        return view('admin.panitia.assign-panitia', compact('panitiaInternal', 'panitiaEksternal', 'devisiList', 'penggunaList'));
    }


    public function assign(Request $request)
    {
        $request->validate([
            'submission_id' => 'required|exists:rekrutmen_submissions,id',
            'devisi_id' => 'required|exists:kategori_devisi,id',
        ]);

        DB::table('devisi_submission')->updateOrInsert(
            ['submission_id' => $request->submission_id],
            ['devisi_id' => $request->devisi_id, 'updated_at' => now()]
        );

        return back()->with('success', 'Panitia berhasil disandikan ke devisi.');
    }

}
