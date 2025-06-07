<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FePostController extends Controller
{
    public function index()
    {
        return view('frontend.post.index');
    }

    public function show(/*$slug*/)
    {
        return view('frontend.post.post-detail'/*, compact('slug')*/);
    }
}
