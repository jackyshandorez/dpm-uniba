<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekrutmenSubmission extends Model
{
    use HasFactory;
    protected $fillable = ['form_id'];

    public function fields()
    {
        return $this->hasMany(RekrutmenSubmissionField::class, 'submission_id');
    }

    public function form()
    {
        return $this->belongsTo(RekrutmenForm::class, 'form_id');
    }

    public function devisi()
{
    return $this->belongsToMany(Devisi::class, 'devisi_submission', 'submission_id', 'devisi_id');
}

}
