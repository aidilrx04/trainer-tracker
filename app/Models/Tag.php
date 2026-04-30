<?php

namespace App\Models;

use Database\Factories\TagFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<TagFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'category'
    ];


    public function trainerProfiles()
    {
        return $this->belongsToMany(TrainerProfile::class, 'tag_trainer');
    }
}
