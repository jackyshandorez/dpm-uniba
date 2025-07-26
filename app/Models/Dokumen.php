<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    use HasFactory;
    protected $table = 'dokumen';

    const GAMBAR_PATH = 'dokumen/foto';
    const FILE_PATH = 'dokumen/file';

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'penulis',
        'gambar',
        'file',
        'tanggal_terbit',
        'status',
    ];
}
