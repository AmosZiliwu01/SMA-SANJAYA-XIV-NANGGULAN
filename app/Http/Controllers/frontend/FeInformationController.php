<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeInformationController extends Controller
{
    public function index()
    {
        return view('frontend.information.index');
    }
}
