<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerCertification extends Model
{
    protected $casts = [
        'expires_at' => 'date'
    ];

    public function trainerProfile()
    {
        return $this->belongsTo(TrainerProfile::class);
    }

    public function isExpired()
    {
        if (!$this->expires_at) return false;
        return $this->expires_at->isPast();
    }

    public function documents()
    {
        return $this->hasMany(CertificateDocument::class);
    }
}
