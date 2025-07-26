<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::orderBy('tanggal', 'asc')->get();
        return view('admin.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('admin.agenda.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'nullable|string|max:255',
            'status' => 'required|in:Akan Datang,Berlangsung,Selesai',
        ]);

        Agenda::create($request->all());

        return redirect('/agenda')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit( $id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'lokasi' => 'nullable|string|max:255',
            'status' => 'required|in:Akan Datang,Berlangsung,Selesai',
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update($request->all());

        return redirect('/agenda')->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect('/agenda')->with('success', 'Agenda berhasil dihapus.');
    }
}
