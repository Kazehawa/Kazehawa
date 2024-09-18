<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveBroadcast extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'video',
        // Add any other columns you want to fillable array
    ];

    // Add any relationships or additional methods you need for the LiveBroadcast model
}
