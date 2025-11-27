<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'room',
        'teacher_id',
    ];

    protected $casts = [
        'units' => 'decimal:1',
    ];

    /**
     * Get the teacher assigned to this subject.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
