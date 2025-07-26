<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumni extends Model
{
    use HasFactory;
    protected $table = 'alumni';
    protected $fillable = [
        'nama_alumni',
        'jabatan_id',
        'periode',
        'jenis_kelamin',
        'foto'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
