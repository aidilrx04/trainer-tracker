<?php

namespace App\Models;

use Database\Factories\TrainerAwardFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerAward extends Model
{
    /** @use HasFactory<TrainerAwardFactory> */
    use HasFactory;

    protected $fillable = [
        'trainer_profile_id',
        'award_name',
        'issuing_organization',
        'year',
    ];

    public function trainerProfile()
    {
        return $this->belongsTo(TrainerProfile::class);
    }
}
