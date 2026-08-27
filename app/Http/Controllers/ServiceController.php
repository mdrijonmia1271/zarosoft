<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $categories = ServiceCategory::with(['activeServices'])->where('is_active', true)->orderBy('order')->get();
        $allServices = Service::with('category')->where('is_active', true)->orderBy('order')->get();
        
        $currentCategory = $request->query('category');
        if ($currentCategory) {
            $filteredServices = Service::whereHas('category', function ($q) use ($currentCategory) {
                $q->where('slug', $currentCategory);
            })->where('is_active', true)->orderBy('order')->get();
        } else {
            $filteredServices = $allServices;
        }

        return view('services.index', compact('categories', 'allServices', 'filteredServices', 'currentCategory'));
    }

    public function show(string $slug)
    {
        $service = Service::with('category')->where('slug', $slug)->where('is_active', true)->firstOrFail();
        
        // Related services
        $relatedServices = Service::where('service_category_id', $service->service_category_id)
            ->where('id', '!=', $service->id)
            ->where('is_active', true)
            ->take(3)
            ->get();

        // Relevant projects
        $relatedProjects = Project::where('is_active', true)->take(2)->get();

        return view('services.show', compact('service', 'relatedServices', 'relatedProjects'));
    }
}
