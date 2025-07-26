<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panitia;
use App\Models\Pengguna;
use App\Models\Devisi;
use App\Models\RekrutmenSubmission;
use App\Models\RekrutmenForm;


class PanitiaController extends Controller
{
    // Tampilkan halaman assign panitia berdasarkan form
    public function indexInternal(Request $request)
    {
        $formId = $request->form_id;

        $form = RekrutmenForm::findOrFail($formId);

        // Semua pengguna internal
        $penggunaList = Pengguna::all();

        // Semua submission eksternal yang diterima
        $submissions = RekrutmenSubmission::with('fields')
            ->where('form_id', $formId)
            ->where('status', 'diterima')
            ->get();

        // Panitia internal yang sudah diassign untuk form ini
        $panitiaInternal = Panitia::with('devisi')
            ->where('form_id', $formId)
            ->where('jenis', 'internal')
            ->get()
            ->keyBy('pengguna_id');

        // Panitia eksternal yang sudah diassign untuk form ini
        $panitiaEksternalMap = Panitia::with('devisi')
            ->where('form_id', $formId)
            ->where('jenis', 'eksternal')
            ->get()
            ->keyBy('submission_id');

        // List panitia eksternal untuk tabel tampilan
        $panitiaEksternal = $submissions->map(function ($submission) use ($panitiaEksternalMap) {
            $nama = $submission->fields->firstWhere('field_name', 'nama_lengkap')?->value ?? '-';
            $panitia = $panitiaEksternalMap[$submission->id] ?? null;

            return (object)[
                'id' => $submission->id,
                'nama' => $nama,
                'devisi' => $panitia?->devisi?->nama,
            ];
        });

        // Rekap semua panitia (internal dan eksternal) untuk form ini
        $rekapSemuaPanitia = Panitia::with(['pengguna', 'submission.fields', 'devisi'])
            ->where('form_id', $formId)
            ->orderBy('jenis')
            ->get();

        // Semua devisi
        $devisiList = Devisi::all();

        return view('admin.panitia.assign-panitia', compact(
            'form',
            'formId',
            'penggunaList',
            'panitiaInternal',
            'panitiaEksternal',
            'devisiList',
            'rekapSemuaPanitia'
        ));
    }

    // Menyimpan atau memperbarui panitia internal/eksternal
    public function store(Request $request)
    {
        $request->validate([
            'form_id' => 'required|exists:rekrutmen_forms,id',
            'devisi_id' => 'required|exists:kategori_devisi,id',
            'tipe' => 'required|in:internal,eksternal',
        ]);

        if ($request->tipe === 'internal') {
            $request->validate(['pengguna_id' => 'required|exists:pengguna,id']);

            $existing = Panitia::where('form_id', $request->form_id)
                ->where('pengguna_id', $request->pengguna_id)
                ->where('jenis', 'internal')
                ->first();

            if ($existing) {
                $existing->update(['devisi_id' => $request->devisi_id]);
            } else {
                Panitia::create([
                    'form_id' => $request->form_id,
                    'pengguna_id' => $request->pengguna_id,
                    'devisi_id' => $request->devisi_id,
                    'jenis' => 'internal',
                ]);
            }
        } elseif ($request->tipe === 'eksternal') {
            $request->validate(['submission_id' => 'required|exists:rekrutmen_submissions,id']);

            $existing = Panitia::where('form_id', $request->form_id)
                ->where('submission_id', $request->submission_id)
                ->where('jenis', 'eksternal')
                ->first();

            if ($existing) {
                $existing->update(['devisi_id' => $request->devisi_id]);
            } else {
                Panitia::create([
                    'form_id' => $request->form_id,
                    'submission_id' => $request->submission_id,
                    'devisi_id' => $request->devisi_id,
                    'jenis' => 'eksternal',
                ]);
            }
        }

        return redirect()->back()->with('success', 'Panitia berhasil disimpan atau diperbarui.');
    }
}
