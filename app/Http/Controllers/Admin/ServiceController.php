<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->orderBy('service_category_id')->orderBy('order')->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:200',
            'slug' => 'nullable|string|max:200|unique:services,slug',
            'icon' => 'nullable|string|max:50',
            'badge' => 'nullable|string|max:50',
            'short_description' => 'required|string|max:500',
            'description' => 'nullable|string',
            'features' => 'nullable|string', // newline separated
            'tech_stack' => 'nullable|string', // comma separated
            'benefits' => 'nullable|string', // newline separated
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $features = !empty($validated['features']) ? array_filter(array_map('trim', explode("\n", $validated['features']))) : [];
        $tech_stack = !empty($validated['tech_stack']) ? array_filter(array_map('trim', explode(",", $validated['tech_stack']))) : [];
        $benefits = !empty($validated['benefits']) ? array_filter(array_map('trim', explode("\n", $validated['benefits']))) : [];

        Service::create([
            'service_category_id' => $validated['service_category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'icon' => $validated['icon'] ?? 'code',
            'badge' => $validated['badge'] ?? null,
            'short_description' => $validated['short_description'],
            'description' => $validated['description'] ?? null,
            'features' => array_values($features),
            'tech_stack' => array_values($tech_stack),
            'benefits' => array_values($benefits),
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:200',
            'slug' => 'nullable|string|max:200|unique:services,slug,' . $service->id,
            'icon' => 'nullable|string|max:50',
            'badge' => 'nullable|string|max:50',
            'short_description' => 'required|string|max:500',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'tech_stack' => 'nullable|string',
            'benefits' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $features = !empty($validated['features']) ? array_filter(array_map('trim', explode("\n", $validated['features']))) : [];
        $tech_stack = !empty($validated['tech_stack']) ? array_filter(array_map('trim', explode(",", $validated['tech_stack']))) : [];
        $benefits = !empty($validated['benefits']) ? array_filter(array_map('trim', explode("\n", $validated['benefits']))) : [];

        $service->update([
            'service_category_id' => $validated['service_category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'icon' => $validated['icon'] ?? 'code',
            'badge' => $validated['badge'] ?? null,
            'short_description' => $validated['short_description'],
            'description' => $validated['description'] ?? null,
            'features' => array_values($features),
            'tech_stack' => array_values($tech_stack),
            'benefits' => array_values($benefits),
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
