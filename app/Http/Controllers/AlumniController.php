<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumni as Alumni;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Storage;
use App\Utils\TextFormat;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumniImport;


class AlumniController extends Controller
{
    public function index()
    {
        // Ambil semua periode unik dari terbaru ke lama
        $periodeList = Alumni::select('periode')
            ->distinct()
            ->orderByDesc('periode')
            ->pluck('periode');

        // Alumni per periode diurutkan berdasarkan jabatan_id
        $alumniByPeriode = [];
        foreach ($periodeList as $periode) {
            $alumniByPeriode[$periode] = Alumni::with('jabatan')
                ->where('periode', $periode)
                ->orderBy('jabatan_id') // bisa juga 'jabatan.nama_jabatan' pakai join
                ->get();
        }

        return view('admin.alumni.index', compact('alumniByPeriode'));
    }


    public function create()
    {
        $jabatan = Jabatan::all();
        return view('admin.alumni.tambah', compact('jabatan'));
    }

    public function store(Request $request)
    {
        // 🔁 Cek jika ada upload file Excel
        if ($request->hasFile('excel')) {
            $request->validate([
                'excel' => 'required|file|mimes:xlsx,xls,csv|max:2048',
            ]);

            Excel::import(new AlumniImport, $request->file('excel'));

            return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diimpor dari Excel.');
        }

        // 🔁 Validasi input manual
        $request->validate([
            'nama_alumni' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatan,id',
            'periode' => 'required|string|max:10',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto-alumni', 'public');
        }

        $import = new AlumniImport();
        Excel::import($import, $request->file('excel'));

        if (!empty($import->errors)) {
            return redirect()->back()->withErrors($import->errors);
        }

        Alumni::create([
            'nama_alumni' => $request->nama_alumni,
            'jabatan_id' => $request->jabatan_id,
            'periode' => $request->periode,
             'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('alumni.index')->with('success', 'Alumni berhasil ditambahkan.');
    }



    public function show($id)
    {
        $alumni = Alumni::with('jabatan')->findOrFail($id);
        return view('admin.alumni.show', compact('alumni'));
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        $jabatans = Jabatan::all();
        return view('admin.alumni.edit', compact('alumni', 'jabatans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alumni' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatan,id',
            'periode' => 'required|string|max:10',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ], [
            'nama_alumni.required' => 'Nama alumni wajib diisi.',
            'jabatan_id.required' => 'Jabatan wajib dipilih.',
            'jabatan_id.exists' => 'Jabatan yang dipilih tidak valid.',
            'periode.required' => 'Periode wajib diisi.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Format foto harus jpeg, png, atau jpg.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        $alumni = Alumni::findOrFail($id);

        $data = $request->only(['nama_alumni', 'jabatan_id', 'periode']);

        if ($request->hasFile('foto')) {
            if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
                Storage::disk('public')->delete($alumni->foto);
            }
            $data['foto'] = $request->file('foto')->store('alumni/foto', 'public');
        }

        $alumni->update($data);

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);

        if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
            Storage::disk('public')->delete($alumni->foto);
        }

        $alumni->delete();

        return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil dihapus.');
    }
}
