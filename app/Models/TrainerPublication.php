<?php

namespace App\Models;

use Database\Factories\TrainerPublicationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerPublication extends Model
{
    /** @use HasFactory<TrainerPublicationFactory> */
    use HasFactory;

    protected $fillable = [
        'trainer_profile_id',
        'title',
        'publication_name',
        'published_at',
        'link'
    ];

    public function trainerProfile()
    {
        return $this->belongsTo(TrainerProfile::class);
    }
}
