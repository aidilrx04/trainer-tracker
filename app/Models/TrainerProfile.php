<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'years_experience',
        'profile_picture',
        'cv_path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class);
    }

    public function educations()
    {
        return $this->hasMany(TrainerEducation::class)->orderByDesc('completion_year');
    }

    public function certifications()
    {
        return $this->hasMany(TrainerCertification::class)->orderByDesc('year_obtained');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_trainer', 'trainer_profile_id', 'tag_id', 'id', 'id');
    }

    public function specializations()
    {
        return $this->tags()->where('category', 'specialization');
    }
    public function industries()
    {
        return $this->tags()->where('category', 'industry');
    }
    public function trainingMethods()
    {
        return $this->tags()->where('category', 'training_methods');
    }
    public function tools()
    {
        return $this->tags()->where('category', 'tools');
    }
    public function consultings()
    {
        return $this->tags()->where('category', 'consulting');
    }
    public function coachings()
    {
        return $this->tags()->where('category', 'coaching');
    }
    public function assessments()
    {
        return $this->tags()->where('category', 'assessment');
    }

    public function languages()
    {
        return $this->hasMany(TrainerLanguage::class);
    }

    public function experiences()
    {
        return $this->hasMany(TrainerExperience::class)->orderByDesc('start_date');
    }

    public function recentPrograms()
    {
        return $this->hasMany(RecentTrainingProgram::class);
    }

    public function awards()
    {
        return $this->hasMany(TrainerAward::class);
    }

    public function publications()
    {
        return $this->hasMany(TrainerPublication::class);
    }

    public function speakingEngagements()
    {
        return $this->hasMany(TrainerEngagement::class);
    }
}
