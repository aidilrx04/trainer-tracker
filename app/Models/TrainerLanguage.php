<?php

namespace App\Models;

use Database\Factories\TrainerLanguageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerLanguage extends Model
{
    /** @use HasFactory<TrainerLanguageFactory> */
    use HasFactory;

    protected $fillable = [
        'trainer_profile_id',
        'language',
        'profiency',
    ];

    public function trainerProfile()
    {
        return $this->belongsTo(TrainerProfile::class);
    }
}
