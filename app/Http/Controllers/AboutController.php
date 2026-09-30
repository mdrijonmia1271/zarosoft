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

        // The lead founder signs the hero quote card.
        $founder = $team->first(fn (TeamMember $member) => $member->is_founder && ! $member->is_advisor)
            ?? $team->first();

        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('about.index', compact('team', 'founder', 'testimonials'));
    }
}
