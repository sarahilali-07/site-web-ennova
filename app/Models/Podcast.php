<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    protected $fillable = [
        'title',
        'description',
        'guest',
        'duration',
        'youtube_url',
        'thumbnail',
        'media_url',
    ];
}
