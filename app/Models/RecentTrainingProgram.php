<?php

namespace App\Models;

use Database\Factories\RecentTrainingProgramFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentTrainingProgram extends Model
{
    /** @use HasFactory<RecentTrainingProgramFactory> */
    use HasFactory;

    protected $fillable = [
        'trainer_profile_id',
        'program_name',
        'client',
        'date_string',
        'participant_count',
        'duration'
    ];

    public function trainerProfile()
    {
        return $this->belongsTo(TrainerProfile::class);
    }
}
