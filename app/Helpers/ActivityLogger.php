<?php

namespace App\Helpers;

use App\Models\ActivityLog;

class ActivityLogger
{
    public static function log($action)
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'logged_at' => now(),
        ]);
    }
}
