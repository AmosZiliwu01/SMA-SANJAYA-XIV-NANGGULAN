<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FeDocumentController extends Controller
{
    public function index()
    {
        $files=File::all();
        return view('frontend.document.index', compact('files'));
    }
}
