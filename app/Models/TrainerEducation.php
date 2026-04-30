<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerEducation extends Model
{
    public function documents()
    {
        return $this->hasMany(EducationDocument::class);
    }
}
