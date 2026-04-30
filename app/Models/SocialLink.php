<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'trainer_profile_id',
        'platform',
        'url'
    ];
}
