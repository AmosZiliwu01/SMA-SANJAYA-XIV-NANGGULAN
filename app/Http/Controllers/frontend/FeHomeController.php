<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Agenda;
use App\Models\Announcement;
use App\Models\SchoolPrincipal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FeHomeController extends Controller
{
    public function index()
    {
        // Get slider posts (posts marked as slider)
        $sliderPosts = Post::where('is_slider', true)
            ->with(['category', 'user'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Get latest news/posts
        $latestPosts = Post::with(['category', 'user'])
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Get gallery images for preview
        $galleryImages = Gallery::with('user')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Get upcoming agendas
        $upcomingAgendas = Agenda::where('start_date', '>=', Carbon::now())
            ->orderBy('start_date', 'asc')
            ->take(4)
            ->get();

        // Get latest announcements
        $latestAnnouncements = Announcement::with('user')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Get active school principal
        $schoolPrincipal = SchoolPrincipal::where('is_active', true)
            ->first();

        return view('frontend.home.index', compact(
            'sliderPosts',
            'latestPosts',
            'galleryImages',
            'upcomingAgendas',
            'latestAnnouncements',
            'schoolPrincipal'
        ));
    }
}
