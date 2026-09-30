<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $allProjects = Project::with('category')->where('is_active', true)->orderBy('order')->get();

        // The lead featured project gets the large banner; the rest fill the grid.
        $featured = $allProjects->firstWhere('is_featured', true) ?? $allProjects->first();
        $projects = $allProjects->reject(fn (Project $project) => $project->is($featured))->values();

        // Only offer filter pills for categories that have a card to show.
        $categories = $projects->pluck('category')->filter()->unique('id')->sortBy('order')->values();

        return view('portfolio.index', compact('featured', 'projects', 'categories'));
    }

    public function show(string $slug)
    {
        $project = Project::with('category')->where('slug', $slug)->where('is_active', true)->firstOrFail();
        
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('project_category_id', $project->project_category_id)
            ->where('is_active', true)
            ->take(2)
            ->get();

        if ($relatedProjects->isEmpty()) {
            $relatedProjects = Project::where('id', '!=', $project->id)->where('is_active', true)->take(2)->get();
        }

        return view('portfolio.show', compact('project', 'relatedProjects'));
    }
}
