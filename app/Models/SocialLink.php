<?php

namespace App\Models;

use Database\Factories\SocialLinkFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    /** @use HasFactory<SocialLinkFactory> */
    use HasFactory;

    protected $fillable = [
        'trainer_profile_id',
        'platform',
        'url'
    ];

    public function trainerProfile()
    {
        return $this->belongsTo(TrainerProfile::class);
    }
}
