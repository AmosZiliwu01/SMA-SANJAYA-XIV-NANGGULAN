<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FeInformationController extends Controller
{
    public function index()
    {
        $announcements = Announcement::all();
        $agendas = Agenda::all();
        return view('frontend.information.index', compact('announcements', 'agendas'));
    }
}
