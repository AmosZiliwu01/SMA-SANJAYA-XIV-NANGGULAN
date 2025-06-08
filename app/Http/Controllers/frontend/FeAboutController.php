<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSchool;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FeAboutController extends Controller
{
    public function index()
    {
        $aboutSchool = AboutSchool::where('is_active', true)->first();
        $testimonials = Testimonial::latest()->get();

        return view('frontend.about.index', compact('aboutSchool', 'testimonials'));
    }
}
