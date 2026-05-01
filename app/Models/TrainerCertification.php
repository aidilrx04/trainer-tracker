<?php

namespace App\Models;

use Database\Factories\TrainerCertificationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerCertification extends Model
{
    /** @use HasFactory<TrainerCertificationFactory> */
    use HasFactory;

    protected $fillable = [
        'trainer_profile_id',
        'certification_name',
        'issuing_body',
        'year_obtained',
        'expires_at',
        'document_paths'
    ];

    protected $casts = [
        'expires_at' => 'date',
        'document_paths' => 'array'
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
