<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->where('is_active', true)->orderBy('order')->get();

        $faqs = Faq::where('is_active', true)->orderBy('order')->take(5)->get();

        return view('services.index', compact('services', 'faqs'));
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
