<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Komentar;


class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';

    protected $fillable = [
    'judul',
    'slug',
    'konten',
    'deskripsi_singkat',
    'kategori_id',
    'tanggal_publish',
    'status',
    'thumbnail',
    'penulis',
    'views',
    ];

    // app/Models/Berita.php

    // public function komentars()
    // {
    //     return $this->hasMany(Komentar::class)->whereNull('parent_id')->latest();
    // }

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id');
    }

        public function komentars()
    {
        return $this->hasMany(Komentar::class)
                    ->whereNull('parent_id')
                    ->latest()
                    ->with(['balasan.user', 'user']);
    }



}
