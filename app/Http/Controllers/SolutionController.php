<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\Project;

class SolutionController extends Controller
{
    public function index()
    {
        $industries = Industry::where('is_active', true)->orderBy('order')->get();
        $projects = Project::with('category')->where('is_active', true)->take(4)->get();

        return view('solutions.index', compact('industries', 'projects'));
    }
}
