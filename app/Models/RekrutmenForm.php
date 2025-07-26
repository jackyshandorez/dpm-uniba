<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekrutmenForm extends Model
{
        use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'status', 'batas_akhir', 'created_by'];

    public function fields()
    {
        return $this->hasMany(RekrutmenField::class, 'form_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
