<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekrutmenSubmissionField extends Model
{
    use HasFactory;
    protected $fillable = ['submission_id', 'field_name', 'value'];

    public function submission()
    {
        return $this->belongsTo(RekrutmenSubmission::class, 'submission_id');
    }


}
