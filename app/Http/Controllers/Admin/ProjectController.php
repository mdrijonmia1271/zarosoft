<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $projects = Project::with('category')->orderBy('order')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'title' => 'required|string|max:250',
            'slug' => 'nullable|string|max:250|unique:projects,slug',
            'client_name' => 'nullable|string|max:200',
            'industry' => 'nullable|string|max:100',
            'duration' => 'nullable|string|max:50',
            'tagline' => 'nullable|string|max:300',
            'overview' => 'required|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'key_features' => 'nullable|string',
            'tech_stack' => 'nullable|string',
            'results' => 'nullable|string',
            'thumbnail' => 'nullable|string|max:2048',
            'thumbnail_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
            'hero_image' => 'nullable|string|max:2048',
            'hero_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
            'live_url' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $key_features = !empty($validated['key_features']) ? array_filter(array_map('trim', explode("\n", $validated['key_features']))) : [];
        $tech_stack = !empty($validated['tech_stack']) ? array_filter(array_map('trim', explode(",", $validated['tech_stack']))) : [];
        $results = !empty($validated['results']) ? array_filter(array_map('trim', explode("\n", $validated['results']))) : [];

        Project::create([
            'project_category_id' => $validated['project_category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'client_name' => $validated['client_name'] ?? null,
            'industry' => $validated['industry'] ?? null,
            'duration' => $validated['duration'] ?? null,
            'tagline' => $validated['tagline'] ?? null,
            'overview' => $validated['overview'],
            'problem' => $validated['problem'] ?? null,
            'solution' => $validated['solution'] ?? null,
            'key_features' => array_values($key_features),
            'tech_stack' => array_values($tech_stack),
            'results' => array_values($results),
            'thumbnail' => $this->resolveImageField($request, 'thumbnail', 'projects'),
            'hero_image' => $this->resolveImageField($request, 'hero_image', 'projects'),
            'live_url' => $validated['live_url'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'title' => 'required|string|max:250',
            'slug' => 'nullable|string|max:250|unique:projects,slug,' . $project->id,
            'client_name' => 'nullable|string|max:200',
            'industry' => 'nullable|string|max:100',
            'duration' => 'nullable|string|max:50',
            'tagline' => 'nullable|string|max:300',
            'overview' => 'required|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'key_features' => 'nullable|string',
            'tech_stack' => 'nullable|string',
            'results' => 'nullable|string',
            'thumbnail' => 'nullable|string|max:2048',
            'thumbnail_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
            'hero_image' => 'nullable|string|max:2048',
            'hero_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
            'live_url' => 'nullable|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $key_features = !empty($validated['key_features']) ? array_filter(array_map('trim', explode("\n", $validated['key_features']))) : [];
        $tech_stack = !empty($validated['tech_stack']) ? array_filter(array_map('trim', explode(",", $validated['tech_stack']))) : [];
        $results = !empty($validated['results']) ? array_filter(array_map('trim', explode("\n", $validated['results']))) : [];

        $project->update([
            'project_category_id' => $validated['project_category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'client_name' => $validated['client_name'] ?? null,
            'industry' => $validated['industry'] ?? null,
            'duration' => $validated['duration'] ?? null,
            'tagline' => $validated['tagline'] ?? null,
            'overview' => $validated['overview'],
            'problem' => $validated['problem'] ?? null,
            'solution' => $validated['solution'] ?? null,
            'key_features' => array_values($key_features),
            'tech_stack' => array_values($tech_stack),
            'results' => array_values($results),
            'thumbnail' => $this->resolveImageField($request, 'thumbnail', 'projects', $project->thumbnail),
            'hero_image' => $this->resolveImageField($request, 'hero_image', 'projects', $project->hero_image),
            'live_url' => $validated['live_url'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
