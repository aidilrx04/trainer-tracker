<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerEducation extends Model
{
    protected $table = 'trainer_educations';

    protected $fillable = [
        'trainer_profile_id',
        'degree_name',
        'institution_name',
        'completion_year',
        'location',
        'grade'
    ];

    public function documents()
    {
        return $this->hasMany(EducationDocument::class);
    }
}
