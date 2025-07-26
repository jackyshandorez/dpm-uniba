<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasis = Notifikasi::latest()->get();
        return view('admin.notifikasi.index', compact('notifikasis'));
    }

    public function tandaiDibaca($id)
    {
        $notif = Notifikasi::findOrFail($id);
        $notif->update(['dibaca' => true]);
        return $notif->link ? redirect($notif->link) : back();
    }

    public function bacaSemua()
    {
        Notifikasi::where('dibaca', false)->update(['dibaca' => true]);
        return back();
    }
}
