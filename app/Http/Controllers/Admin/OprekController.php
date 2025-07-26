<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekrutmenForm;
use App\Models\RekrutmenField;
use Illuminate\Support\Facades\DB;


class OprekController extends Controller
{
   public function index()
    {
        $rekrutmen_forms = RekrutmenForm::latest()->get();
        return view('admin.oprek.index', compact('rekrutmen_forms'));
    }

    public function create()
    {
        return view('admin.oprek.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_akhir' => 'required|date',
            'fields' => 'required|array|min:1',
            'fields.*.label' => 'required|string|max:255',
            'fields.*.name' => 'required|string|alpha_dash|max:100',
            'fields.*.type' => 'required|string|in:text,number,email,date,textarea,select,checkbox,radio,file',
            'fields.*.required' => 'nullable|boolean'
        ]);

        DB::beginTransaction();
        try {
            $form = RekrutmenForm::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'status' => 'buka',
                'batas_akhir' => $request->batas_akhir,
                'created_by' => auth()->id() ?? 1,
            ]);

            foreach ($request->fields as $field) {
                RekrutmenField::create([
                    'form_id' => $form->id,
                    'label' => $field['label'],
                    'name' => $field['name'],
                    'type' => $field['type'],
                    'required' => !empty($field['required']),
                ]);
            }

            DB::commit();
            return redirect()->route('oprek.index')->with('success', 'Form '.$form->judul. ' berhasil dibuat.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Gagal menyimpan form: ' . $e->getMessage())->withInput();
        }
    }

    public function toggleStatus($id)
    {
        $form = RekrutmenForm::findOrFail($id);
        $form->status = $form->status === 'buka' ? 'tutup' : 'buka';
        $form->save();

        return redirect()->back()->with('success', 'Status form berhasil diperbarui.');
    }

    public function edit($id)
    {
        $form = RekrutmenForm::with('fields')->findOrFail($id);
        return view('admin.oprek.edit', compact('form'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_akhir' => 'required|date',
            'fields' => 'required|array|min:1',
            'fields.*.label' => 'required|string|max:255',
            'fields.*.name' => 'required|string|alpha_dash|max:100',
            'fields.*.type' => 'required|string|in:text,number,email,date,textarea,select,checkbox,radio,file',
            'fields.*.required' => 'nullable|boolean'
        ]);

        DB::beginTransaction();
        try {
            $form = RekrutmenForm::findOrFail($id);
            $form->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'batas_akhir' => $request->batas_akhir,
            ]);

            // Hapus field lama lalu insert ulang
            RekrutmenField::where('form_id', $form->id)->delete();

            foreach ($request->fields as $field) {
                RekrutmenField::create([
                    'form_id' => $form->id,
                    'label' => $field['label'],
                    'name' => $field['name'],
                    'type' => $field['type'],
                    'required' => !empty($field['required']),
                ]);
            }

            DB::commit();
            return redirect()->route('oprek.index')->with('success', 'Form '.$form->judul .' berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Gagal memperbarui form: ' . $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $form = RekrutmenForm::with('fields', 'creator')->findOrFail($id);
        return view('admin.oprek.show', compact('form'));
    }



    public function destroy($id)
    {
        $form = RekrutmenForm::findOrFail($id);
        $form->delete();
        return redirect()->route('oprek.index')->with('success', 'Form'.$form->judul .' berhasil dihapus.');
    }

}
