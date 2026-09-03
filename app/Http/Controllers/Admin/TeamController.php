<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $members = TeamMember::orderBy('order')->paginate(15);
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'designation' => 'required|string|max:150',
            'role_title' => 'nullable|string|max:100',
            'bio' => 'required|string',
            'avatar' => 'nullable|string|max:2048',
            'avatar_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'linkedin_url' => 'nullable|string',
            'github_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'skills' => 'nullable|string',
            'is_founder' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $skills = !empty($validated['skills']) ? array_filter(array_map('trim', explode(',', $validated['skills']))) : [];

        TeamMember::create([
            'name' => $validated['name'],
            'designation' => $validated['designation'],
            'role_title' => $validated['role_title'] ?? null,
            'bio' => $validated['bio'],
            'avatar' => $this->resolveImageField($request, 'avatar', 'team'),
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'github_url' => $validated['github_url'] ?? null,
            'twitter_url' => $validated['twitter_url'] ?? null,
            'skills' => array_values($skills),
            'is_founder' => $request->boolean('is_founder'),
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'designation' => 'required|string|max:150',
            'role_title' => 'nullable|string|max:100',
            'bio' => 'required|string',
            'avatar' => 'nullable|string|max:2048',
            'avatar_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'linkedin_url' => 'nullable|string',
            'github_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'skills' => 'nullable|string',
            'is_founder' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $skills = !empty($validated['skills']) ? array_filter(array_map('trim', explode(',', $validated['skills']))) : [];

        $team->update([
            'name' => $validated['name'],
            'designation' => $validated['designation'],
            'role_title' => $validated['role_title'] ?? null,
            'bio' => $validated['bio'],
            'avatar' => $this->resolveImageField($request, 'avatar', 'team', $team->avatar),
            'email' => $validated['email'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'github_url' => $validated['github_url'] ?? null,
            'twitter_url' => $validated['twitter_url'] ?? null,
            'skills' => array_values($skills),
            'is_founder' => $request->boolean('is_founder'),
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member removed successfully.');
    }
}
