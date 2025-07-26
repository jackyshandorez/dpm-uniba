<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class OrganisasiController extends Controller
{
    // Menampilkan daftar organisasi
    public function index()
    {
        $organisasi = Organisasi::all();
        return view('admin.organisasi.index', compact('organisasi'));
    }

    // Form tambah
    public function create()
    {
        return view('admin.organisasi.tambah');
    }

    // Simpan organisasi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ], [
            'nama.required' => 'Nama organisasi wajib diisi.',
            'nama.string' => 'Nama organisasi harus berupa teks.',
            'nama.max' => 'Nama organisasi maksimal 255 karakter.',
            'link.url' => 'Link harus berupa URL yang valid.',
            'link.max' => 'Link maksimal 255 karakter.',
            'logo.image' => 'Logo harus berupa gambar.',
            'logo.mimes' => 'Logo harus berformat PNG, JPG, atau JPEG.',
            'logo.max' => 'Ukuran logo maksimal 2 MB.',
        ]);

        $path = null;
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('organisasi/logo', 'public');
        }

        Organisasi::create([
            'nama' => $request->nama,
            'link' => $request->link,
            'logo' => $path,
        ]);

        return redirect()->route('organisasi.index')->with('success', $request->nama . ' berhasil ditambahkan.');
    }

    // Tampilkan detail
    public function show($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        return view('admin.organisasi.show', compact('organisasi'));
    }

    // Form edit
    public function edit($id)
    {
        $dataOrganisasi = Organisasi::findOrFail($id);
        return view('admin.organisasi.edit', compact('dataOrganisasi'));
    }

    // Simpan perubahan
    public function update(Request $request, $id)
    {
        $organisasi = Organisasi::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama.required' => 'Nama organisasi wajib diisi.',
            'link.url' => 'Link harus berupa URL yang valid.',
            'link.max' => 'Link maksimal 255 karakter.',
            'logo.image' => 'Logo harus berupa gambar.',
            'logo.mimes' => 'Logo harus berformat jpeg, png, atau jpg.',
            'logo.max' => 'Ukuran logo maksimal 2 MB.',
        ]);

        $data = $request->only(['nama', 'link']);

        if ($request->hasFile('logo')) {
            if ($organisasi->logo && Storage::disk('public')->exists($organisasi->logo)) {
                Storage::disk('public')->delete($organisasi->logo);
            }
            $data['logo'] = $request->file('logo')->store('organisasi/logo', 'public');
        }

        $organisasi->update($data);

        return redirect()->route('organisasi.index')->with('success', $request->nama . ' berhasil diperbarui.');
    }

    // Hapus organisasi
    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);

        if ($organisasi->logo && Storage::disk('public')->exists($organisasi->logo)) {
            Storage::disk('public')->delete($organisasi->logo);
        }

        $organisasi->delete();

        return redirect()->route('organisasi.index')->with('success', $organisasi->nama. ' berhasil dihapus.');
    }
}
