<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'email',
        'jabatan_id',
        'jurusan_id',
        'angkatan',
        'nik',
        'telepon',
        'alamat',
        'foto',
        'status',
        'tanggal_lahir',
        'jenis_kelamin',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

     public function fakultas()
    {
        return $this->jurusan ? $this->jurusan->fakultas : null;
    }

}
