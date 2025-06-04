<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        // Pengunjung hari ini (unique per device/browser via visitor_id)
        $visitorCountToday = Visitor::whereDate('visited_at', today())
            ->distinct('visitor_id')
            ->count('visitor_id');

        // Total pengunjung unik keseluruhan (dari awal sampai sekarang)
        $totalUniqueVisitors = Visitor::distinct('visitor_id')
            ->count('visitor_id');

        // Total pengunjung keseluruhan (termasuk yang sama dari satu device)
        $totalVisits = Visitor::count();

        // Ambil activity logs terbaru
        $activityLogs = ActivityLog::with('user')
            ->latest('created_at')
            ->take(3)
            ->get();

        return view('backend.dashboard.index', compact(
            'visitorCountToday',
            'totalUniqueVisitors',
            'totalVisits',
            'activityLogs',
        ));
    }

}
