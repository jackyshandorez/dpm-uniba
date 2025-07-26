<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Utils\TextFormat;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::latest()->paginate(10);
        $suratMasuk->getCollection()->transform(function ($item) {
        $item->pengirim = TextFormat::kapitalSemua($item->pengirim);
        return $item;
    });
        return view('admin.surat.masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('admin.surat.masuk.tambah');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_lampiran' => 'nullable|file|mimes:pdf,jpg,png',
            'status' => 'required|in:baru,diproses,selesai',
        ], [
        'nomor_surat.required' => 'Nomor surat wajib diisi.',
        'nomor_surat.max' => 'Nomor surat maksimal 255 karakter.',

        'tanggal_surat.required' => 'Tanggal surat wajib diisi.',
        'tanggal_surat.date' => 'Tanggal surat tidak valid.',

        'pengirim.required' => 'Pengirim wajib diisi.',
        'pengirim.max' => 'Pengirim maksimal 255 karakter.',

        'perihal.required' => 'Perihal wajib diisi.',
        'perihal.max' => 'Perihal maksimal 255 karakter.',

        'file_lampiran.file' => 'Lampiran harus berupa file.',
        'file_lampiran.mimes' => 'Lampiran harus berupa file PDF, JPG, atau PNG.',

        'status.required' => 'Status wajib dipilih.',
        'status.in' => 'Status harus berupa salah satu dari: baru, diproses, atau selesai.',
        ]);

        if ($request->hasFile('file_lampiran')) {
            $file = $request->file('file_lampiran');
            $ext = $file->getClientOriginalExtension();

            // Nama file unik pakai time + ekstensi
            $fileName = time() . '.' . $ext;

            // Simpan file di storage/app/public/surat_masuk
            $filePath = $file->storeAs('surat_masuk', $fileName, 'public');

            $validated['file_lampiran'] = $filePath;
        }

        // Format pengirim jadi kapital semua
        $validated['pengirim'] = TextFormat::kapitalSemua($request->pengirim);

        SuratMasuk::create($validated);

        return redirect()->route('surat.masuk.index')->with('success', 'Surat masuk berhasil disimpan');
    }

    public function edit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('admin.surat.masuk.edit', compact('suratMasuk'));
    }

    public function update(Request $request, $id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'file_lampiran' => 'nullable|file|mimes:pdf,jpg,png',
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        if ($request->hasFile('file_lampiran')) {
            if ($suratMasuk->file_lampiran) {
                \Storage::disk('public')->delete($suratMasuk->file_lampiran);
            }
            $file = $request->file('file_lampiran')->store('surat_masuk', 'public');
            $validated['file_lampiran'] = $file;
        }


        $suratMasuk->update($validated);

        return redirect()->route('surat.masuk.index')->with('success', 'Surat masuk berhasil diperbarui');
    }

    public function show($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('admin.surat.masuk.show', compact('suratMasuk'));
    }


    public function destroy($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);

        if ($suratMasuk->file_lampiran) {
            \Storage::disk('public')->delete($suratMasuk->file_lampiran);
        }

        $suratMasuk->delete();

        return redirect()->route('surat.masuk.index')->with('success', 'Surat masuk berhasil dihapus');
    }
}
