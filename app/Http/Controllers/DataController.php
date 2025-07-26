<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Jabatan;
use App\Models\Fakultas;

class DataController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        $jurusan = Jurusan::all();
        $jabatan = Jabatan::all();

        return view('admin.data.index', compact('fakultas', 'jurusan', 'jabatan'));
    }

}
