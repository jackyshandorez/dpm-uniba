<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
     public function index()
    {
        $suratKeluar = SuratKeluar::latest()->paginate(10);
        return view('admin.surat.keluar.index', compact('suratKeluar'));
    }

    public function create()
    {
        return view('admin.surat.keluar.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'penerima' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'status' => 'required|in:baru,diproses,selesai',
        ], [
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'nomor_surat.max' => 'Nomor surat maksimal 255 karakter.',
            'tanggal_surat.required' => 'Tanggal surat wajib diisi.',
            'tanggal_surat.date' => 'Tanggal surat tidak valid.',
            'penerima.required' => 'Penerima wajib diisi.',
            'penerima.max' => 'Penerima maksimal 255 karakter.',
            'perihal.required' => 'Perihal wajib diisi.',
            'perihal.max' => 'Perihal maksimal 255 karakter.',
            'file_lampiran.file' => 'Lampiran harus berupa file.',
            'file_lampiran.mimes' => 'Lampiran harus berupa PDF, JPG, JPEG, atau PNG.',
            'file_lampiran.max' => 'Lampiran maksimal 5 MB.',
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status harus berupa: baru, diproses, atau selesai.',
        ]);

    if ($request->hasFile('file_lampiran')) {
        $file = $request->file('file_lampiran');
        $ext = $file->getClientOriginalExtension();

        // Nama file unik: time + random + ekstensi
        $fileName = time() . '-' . uniqid() . '.' . $ext;

        // Simpan file di storage/app/public/surat_keluar
        $filePath = $file->storeAs('surat_keluar', $fileName, 'public');

        $validated['file_lampiran'] = $filePath;
    }

    // (Optional) Jika ingin format kapital semua, bisa tambahkan di sini:
    // $validated['penerima'] = TextFormat::kapitalSemua($request->penerima);

    SuratKeluar::create($validated);

    return redirect()->route('surat.keluar.index')->with('success', 'Surat keluar berhasil disimpan');
}


    public function edit($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('admin.surat.keluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, $id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'penerima' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_lampiran' => 'nullable|file|mimes:pdf,jpg,png',
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        if ($request->hasFile('file_lampiran')) {
            if ($suratKeluar->file_lampiran) {
                \Storage::delete($suratKeluar->file_lampiran);
            }
            $file = $request->file('file_lampiran')->store('surat_keluar');
            $validated['file_lampiran'] = $file;
        }

        $suratKeluar->update($validated);

        return redirect()->route('surat.keluar.index')->with('success', 'Surat keluar berhasil diperbarui');
    }

        public function show($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('admin.surat.keluar.show', compact('suratKeluar'));
    }

    public function destroy($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);

        if ($suratKeluar->file_lampiran) {
            \Storage::delete($suratKeluar->file_lampiran);
        }

        $suratKeluar->delete();

        return redirect()->route('surat.keluar.index')->with('success', 'Surat keluar berhasil dihapus');
    }
}
