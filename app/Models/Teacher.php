<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'mobile_number',
        'street',
        'barangay',
        'city',
        'province',
        'profile_picture',
    ];

    /**
     * Get the user that owns the teacher.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subjects assigned to this teacher.
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
