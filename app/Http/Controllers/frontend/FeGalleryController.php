<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class FeGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('frontend.gallery.index', compact('galleries'));
    }
}
