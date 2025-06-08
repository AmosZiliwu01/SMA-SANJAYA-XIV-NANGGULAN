<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class FeTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('frontend.teacher.index', compact('teachers'));
    }
}
