<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'code',
        'title',
        'description',
        'units',
        'program',
        'year_level',
        'term',
        'schedule',
    ];

    protected $casts = [
        'units' => 'decimal:1',
    ];
}
