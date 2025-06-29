<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function logActivity($action)
    {
        try {
            ActivityLog::create([
                'user_id' => auth()->check() ? auth()->id() : null,
                'action' => $action,
                'activity_description' => $action,
                'logged_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Log::info('Activity logged successfully:', [
                'user_id' => auth()->id(),
                'action' => $action,
                'timestamp' => now()
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to log activity: ' . $e->getMessage(), [
                'action' => $action,
                'user_id' => auth()->id() ?? 'guest'
            ]);
        }
    }

}
