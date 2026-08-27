<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProjectCategory::where('is_active', true)->orderBy('order')->get();
        $selectedCategory = $request->query('category');

        $query = Project::with('category')->where('is_active', true)->orderBy('order');
        if ($selectedCategory) {
            $query->whereHas('category', function ($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        }

        $projects = $query->paginate(9);

        return view('portfolio.index', compact('categories', 'projects', 'selectedCategory'));
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
