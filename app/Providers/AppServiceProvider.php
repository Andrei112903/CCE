<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Announcement;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share unseen announcements count with all views
        View::composer('*', function ($view) {
            $unseenCount = 0;
            
            if (Auth::check()) {
                try {
                    $user = Auth::user();
                    
                    // Check if announcement_views table exists
                    if (!\Illuminate\Support\Facades\Schema::hasTable('announcement_views')) {
                        // If table doesn't exist, count all announcements as unseen
                        $targetAudiences = ['All'];
                        if ($user->role === 'student') {
                            $targetAudiences[] = 'Students';
                        } elseif ($user->role === 'teacher') {
                            $targetAudiences[] = 'Teachers';
                        } elseif ($user->role === 'admin') {
                            $targetAudiences[] = 'Admins';
                        }
                        
                        $unseenCount = Announcement::whereIn('target_audience', $targetAudiences)->count();
                    } else {
                        // Determine which announcements the user should see based on role
                        $targetAudiences = ['All'];
                        if ($user->role === 'student') {
                            $targetAudiences[] = 'Students';
                        } elseif ($user->role === 'teacher') {
                            $targetAudiences[] = 'Teachers';
                        } elseif ($user->role === 'admin') {
                            $targetAudiences[] = 'Admins';
                        }
                        
                        // Get all relevant announcements
                        $relevantAnnouncements = Announcement::whereIn('target_audience', $targetAudiences)
                            ->pluck('id');
                        
                        // Get viewed announcement IDs for this user
                        $viewedIds = $user->viewedAnnouncements()->pluck('announcement_id');
                        
                        // Count unseen announcements
                        $unseenCount = $relevantAnnouncements->diff($viewedIds)->count();
                    }
                } catch (\Exception $e) {
                    // If there's any error, try to count all announcements as unseen
                    try {
                        $user = Auth::user();
                        $targetAudiences = ['All'];
                        if ($user->role === 'student') {
                            $targetAudiences[] = 'Students';
                        } elseif ($user->role === 'teacher') {
                            $targetAudiences[] = 'Teachers';
                        } elseif ($user->role === 'admin') {
                            $targetAudiences[] = 'Admins';
                        }
                        $unseenCount = Announcement::whereIn('target_audience', $targetAudiences)->count();
                    } catch (\Exception $e2) {
                        $unseenCount = 0;
                    }
                }
            }
            
            $view->with('unseenAnnouncementsCount', $unseenCount);
        });
    }
}
