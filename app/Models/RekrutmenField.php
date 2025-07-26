<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekrutmenField extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'label', 'name', 'type', 'required'];

    public function form()
    {
        return $this->belongsTo(RekrutmenForm::class, 'form_id');
    }
}
