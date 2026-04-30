<?php

namespace App\Models;

use Database\Factories\TrainerExperienceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerExperience extends Model
{
    /** @use HasFactory<TrainerExperienceFactory> */
    use HasFactory;

    protected $fillable = [
        'trainer_profile_id',
        'company_name',
        'job_title',
        'start_date',
        'end_date',
        'is_current',
        'responsibilities',
        'achievements'
    ];

    public function trainerProfile()
    {
        return $this->belongsTo(TrainerProfile::class);
    }
}
