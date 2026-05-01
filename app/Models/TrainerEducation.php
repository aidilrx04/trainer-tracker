<?php

namespace App\Models;

use Database\Factories\TrainerEducationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerEducation extends Model
{
    /** @use HasFactory<TrainerEducationFactory> */
    use HasFactory;

    protected $table = 'trainer_educations';

    protected $fillable = [
        'trainer_profile_id',
        'degree_name',
        'institution_name',
        'completion_year',
        'location',
        'grade',
        'document_paths',
    ];

    protected $casts = [
        'document_paths' => 'array'
    ];

    // public function documents()
    // {
    //     return $this->hasMany(EducationDocument::class);
    // }

    public function trainerProfile()
    {
        return $this->belongsTo(TrainerProfile::class);
    }
}
