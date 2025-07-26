<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    use HasFactory;
    protected $table = 'panitia';

    protected $fillable =  ['form_id','pengguna_id', 'submission_id', 'devisi_id', 'jenis'];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function devisi()
    {
        return $this->belongsTo(Devisi::class, 'devisi_id');
    }

    public function submission()
    {
        return $this->belongsTo(RekrutmenSubmission::class, 'submission_id');
    }
}
