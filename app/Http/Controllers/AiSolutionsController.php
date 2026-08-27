<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class AiSolutionsController extends Controller
{
    public function index()
    {
        $aiService = Service::where('slug', 'ai-solutions')->first();
        $aiProjects = Project::whereHas('category', function ($q) {
            $q->where('slug', 'ai-automation');
        })->where('is_active', true)->get();

        return view('ai.index', compact('aiService', 'aiProjects'));
    }
}
