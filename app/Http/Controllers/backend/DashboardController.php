<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Album;
use App\Models\Gallery;
use App\Models\Agenda;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Message;
use App\Models\Comment;
use App\Models\Testimonial;
use App\Models\Announcement;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Common data for both admin and author
        $visitorCountToday = Visitor::whereDate('visited_at', today())
            ->distinct('visitor_id')
            ->count('visitor_id');

        $totalUniqueVisitors = Visitor::distinct('visitor_id')
            ->count('visitor_id');

        $totalVisits = Visitor::count();

        // Activity logs
        $activityLogs = ActivityLog::with('user')
            ->latest('created_at')
            ->take(5)
            ->get();

        // Admin-specific data
        $adminData = [];
        if (auth()->user()->role === 'administrator') {
            $adminData = [
                'totalUsers' => User::count(),
                'totalTeachers' => Teacher::count(),
                'totalStudents' => Student::count(),
                'totalClasses' => Classes::count(),
                'unreadMessages' => Message::where('is_read', false)->count(),
                'totalTestimonials' => Testimonial::count(),
                'totalFiles' => File::count(),
                'totalAnnouncements' => Announcement::count(),

                // Recent registrations
                'recentUsers' => User::latest()->take(5)->get(),
                'recentMessages' => Message::where('is_read', false)->latest()->take(3)->get(),

                // Monthly user registrations for chart
                'monthlyUsers' => User::select(
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('COUNT(*) as count')
                )
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get(),

                // Visitor statistics for last month
                'monthlyVisitors' => Visitor::select(
                    DB::raw('MONTH(visited_at) as month'),
                    DB::raw('YEAR(visited_at) as year'),
                    DB::raw('COUNT(DISTINCT visitor_id) as count')
                )
                    ->whereYear('visited_at', date('Y'))
                    ->groupBy('month', 'year')
                    ->orderBy('month')
                    ->get(),

                // Top categories by post count
                'topCategories' => Category::withCount('posts')
                    ->orderBy('posts_count', 'desc')
                    ->take(5)
                    ->get(),

                // Top posts by views (untuk admin)
                'topPosts' => Post::orderBy('views', 'desc')
                    ->take(5)
                    ->get(),
            ];
        }

        // Author-specific data
        $authorData = [];
        if (auth()->user()->role === 'author') {
            $userId = auth()->id();
            $authorData = [
                'myPosts' => Post::where('user_id', $userId)->count(),
                'myAlbums' => Album::where('user_id', $userId)->count(),
                'myGalleries' => Gallery::where('user_id', $userId)->count(),
                'myAgendas' => Agenda::where('user_id', $userId)->count(),
                'totalViews' => Post::where('user_id', $userId)->sum('views'),
                'totalComments' => Comment::whereHas('post', function($query) use ($userId) {
                    $query->where('user_id', $userId);
                })->count(),

                // Recent posts
                'recentPosts' => Post::where('user_id', $userId)
                    ->latest()
                    ->take(5)
                    ->get(),

                // Recent comments on author's posts
                'recentComments' => Comment::whereHas('post', function($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
                    ->with('post')
                    ->latest()
                    ->take(3)
                    ->get(),

                // Monthly posts for chart
                'monthlyPosts' => Post::select(
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('COUNT(*) as count')
                )
                    ->where('user_id', $userId)
                    ->whereYear('created_at', date('Y'))
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get(),

                // Post views over time (last 7 days)
                'postViews' => Post::select(
                    DB::raw('DATE(updated_at) as date'),
                    DB::raw('SUM(views) as total_views')
                )
                    ->where('user_id', $userId)
                    ->where('updated_at', '>=', Carbon::now()->subDays(7))
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get(),

                // Top performing posts
                'topPosts' => Post::where('user_id', $userId)
                    ->orderBy('views', 'desc')
                    ->take(5)
                    ->get(),
            ];
        }

        // Common statistics
        $totalPosts = Post::count();
        $totalCategories = Category::count();
        $totalAlbums = Album::count();
        $totalGalleries = Gallery::count();

        return view('backend.dashboard.index', compact(
            'visitorCountToday',
            'totalUniqueVisitors',
            'totalVisits',
            'activityLogs',
            'adminData',
            'authorData',
            'totalPosts',
            'totalCategories',
            'totalAlbums',
            'totalGalleries'
        ));
    }
}
