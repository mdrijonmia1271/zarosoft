<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $founders = TeamMember::where('is_founder', true)->where('is_active', true)->orderBy('order')->get();
        $team = TeamMember::where('is_active', true)->orderBy('order')->get();
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->take(3)->get();

        return view('about.index', compact('founders', 'team', 'testimonials'));
    }
}
