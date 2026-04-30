<?php

namespace App\Models;

use Database\Factories\TrainerEngagementFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerEngagement extends Model
{
    /** @use HasFactory<TrainerEngagementFactory> */
    use HasFactory;

    protected $fillable = [
        'trainer_profile_id',
        'event_name',
        'role',
        'topic',
        'year',
        'audience_size',
    ];

    public function trainerProfile()
    {
        return $this->belongsTo(TrainerProfile::class);
    }
}
