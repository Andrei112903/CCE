<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'content',
        'date',
        'target_audience',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Get the users who have viewed this announcement.
     */
    public function viewedBy()
    {
        return $this->belongsToMany(User::class, 'announcement_views')
            ->withTimestamps();
    }
}

