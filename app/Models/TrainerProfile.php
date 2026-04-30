<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainerProfile extends Model
{
    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'years_experience',
        'profile_picture'
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

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_trainer');
    }

    public function specializations()
    {
        return $this->tags()->where('category', 'specialization');
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
