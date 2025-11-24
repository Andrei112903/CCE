<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentEnrollment extends Model
{
    protected $fillable = [
        'student_id',
        'subject_code',
        'subject_title',
        'units',
        'schedule',
    ];

    protected $casts = [
        'units' => 'decimal:1',
    ];

    /**
     * Get the student that owns the enrollment.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the subject for this enrollment.
     */
    public function subject()
    {
        return Subject::where('code', $this->subject_code)->first();
    }

    /**
     * Get the grades for this enrollment.
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
}
