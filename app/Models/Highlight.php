<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'video',
       
        // Add any other columns you want to the fillable array
    ];

    // Add any relationships or additional methods you need for the Highlights model
}
