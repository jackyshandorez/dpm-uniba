<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekrutmenForm;
use App\Models\RekrutmenSubmission;
use App\Models\RekrutmenSubmissionField;
use Illuminate\Support\Facades\Storage;
use App\Models\Notifikasi;
use Illuminate\Support\Str;


class FormulirPendaftaranController extends Controller
{
    public function index()
    {
        // Ambil ID form yang sudah ada submission (unik)
        $formIds = RekrutmenSubmission::distinct()->pluck('form_id');

        // Ambil data formulir yang sudah ada pendaftar
        $forms = RekrutmenForm::whereIn('id', $formIds)->paginate(20);

        return view('admin.pendaftaran.index', compact('forms'));
    }

    public function pendaftar($formId)
    {
        // Ambil formulir berdasarkan id
        $form = RekrutmenForm::findOrFail($formId);

        // Ambil semua submission yang terkait form ini, lengkap dengan fields
        $submissions = RekrutmenSubmission::with('fields')
                        ->where('form_id', $formId)
                        ->latest()
                        ->paginate(20);

        return view('admin.pendaftaran.list-pendaftar', compact('form', 'submissions'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        $submission = RekrutmenSubmission::findOrFail($id);
        $submission->status = $request->status;
        $submission->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

        public function indexterima()
    {
        // Ambil ID form yang sudah ada submission (unik)
        $formIds = RekrutmenSubmission::distinct()->pluck('form_id');

        // Ambil data formulir yang sudah ada pendaftar
        $forms = RekrutmenForm::whereIn('id', $formIds)->paginate(20);

        return view('admin.pendaftaran.index-diterima', compact('forms'));
    }

    public function diterima($formId)
    {
        // Ambil formulir berdasarkan id
        $form = RekrutmenForm::findOrFail($formId);

        // Ambil semua submission yang terkait form ini, hanya yang statusnya diterima
        $submissions = RekrutmenSubmission::with('fields')
                        ->where('form_id', $formId)
                        ->where('status', 'diterima') // Tambahkan filter ini
                        ->latest()
                        ->paginate(20);

        return view('admin.pendaftaran.diterima', compact('form', 'submissions'));
    }






    public function store(Request $request)
    {
        $form = RekrutmenForm::with('fields')->findOrFail($request->form_id);

        $rules = [];
        foreach ($form->fields as $field) {
            $rule = [];

            $rule[] = $field->required ? 'required' : 'nullable';

            if ($field->type === 'email') {
                $rule[] = 'email';
            } elseif ($field->type === 'number') {
                $rule[] = 'numeric';
            } elseif ($field->type === 'file') {
                $rule[] = 'file';
                $rule[] = 'max:2048'; // 2MB max
            }

            $rules[$field->name] = implode('|', $rule);
        }

        $validated = $request->validate($rules);

        // Simpan submission utama
        $submission = RekrutmenSubmission::create([
            'form_id' => $form->id
        ]);

        // Simpan semua field
        foreach ($form->fields as $field) {
            $value = null;

            if ($field->type === 'file' && $request->hasFile($field->name)) {
                $value = $request->file($field->name)->store('pendaftaran_uploads', 'public');
            } elseif ($request->has($field->name)) {
                $value = $request->input($field->name);
            }

            RekrutmenSubmissionField::create([
                'submission_id' => $submission->id,
                'field_name' => $field->name,
                'value' => $value
            ]);
        }

        // 🔔 Buat notifikasi hanya sekali setelah semua tersimpan
        $namaLengkap = $validated['nama_lengkap'] ?? '(Tanpa Nama)';
        Notifikasi::create([
            'judul' => 'Pendaftaran Baru: ' . $form->judul,
            'pesan' => "{$namaLengkap} mendaftarkan diri sebagai panitia.",
            'tipe' => 'info',
            'dibaca' => false,
            'link' => route('pendaftar.show', $submission->id),
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim!');
    }


    public function show($id)
    {
        $submission = RekrutmenSubmission::with('fields')->findOrFail($id);

        return view('admin.pendaftaran.show', compact('submission'));
    }

}
