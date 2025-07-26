<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devisi extends Model
{
    use HasFactory;
    protected $table = 'kategori_devisi';

    protected $fillable = [
        'nama',
        'warna',
    ];

    public function submissions()
    {
        return $this->belongsToMany(RekrutmenSubmission::class, 'devisi_submission', 'devisi_id', 'submission_id');
    }

}

