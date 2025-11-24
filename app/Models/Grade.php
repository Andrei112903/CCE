<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    protected $fillable = [
        'student_enrollment_id',
        'type',
        'grade',
    ];

    protected $casts = [
        'grade' => 'decimal:2',
    ];

    /**
     * Get the student enrollment that owns the grade.
     */
    public function studentEnrollment(): BelongsTo
    {
        return $this->belongsTo(StudentEnrollment::class);
    }

    /**
     * Get the student through enrollment.
     */
    public function student()
    {
        return $this->studentEnrollment?->student;
    }
}
