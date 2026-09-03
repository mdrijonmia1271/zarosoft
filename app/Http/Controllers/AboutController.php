<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        // Founders carry the lowest order values, so the grid leads with them
        // and the rest of the team follows in the same staggered layout.
        $team = TeamMember::where('is_active', true)
            ->orderBy('is_founder', 'desc')
            ->orderBy('order')
            ->get();

        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->take(3)
            ->get();

        return view('about.index', compact('team', 'testimonials'));
    }
}
