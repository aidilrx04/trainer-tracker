<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagTrainer extends Model
{
    protected $table = 'tag_trainer';

    protected $fillable = [
        'trainer_profile_id',
        'tag_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
