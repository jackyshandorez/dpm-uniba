<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Komentar;

class PublicUser extends Model
{
    use HasFactory;
        protected $fillable = [
        'email',
        'otp_code',
        'otp_expires_at',
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }

}
