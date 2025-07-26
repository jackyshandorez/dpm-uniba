<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Komentar;

class Komentar extends Model
{
    use HasFactory;
      protected $fillable = ['berita_id', 'public_user_id', 'isi_komentar', 'parent_id'];

    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }

    public function user()
    {
        return $this->belongsTo(PublicUser::class, 'public_user_id');
    }

    public function parent()
    {
        return $this->belongsTo(Komentar::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Komentar::class, 'parent_id');
    }

    // public function balasan()
    // {
    //     return $this->hasMany(Komentar::class, 'parent_id')->orderBy('created_at', 'asc');
    // }
    public function balasan()
    {
        return $this->hasMany(Komentar::class, 'parent_id')->oldest();
    }

}
