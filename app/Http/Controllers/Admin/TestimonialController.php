<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:150',
            'client_position' => 'required|string|max:150',
            'company' => 'required|string|max:150',
            'location' => 'nullable|string|max:150',
            'avatar' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'quote' => 'required|string',
            'project_title' => 'nullable|string|max:200',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        Testimonial::create([
            'client_name' => $validated['client_name'],
            'client_position' => $validated['client_position'],
            'company' => $validated['company'],
            'location' => $validated['location'] ?? null,
            'avatar' => $validated['avatar'] ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=200&auto=format&fit=crop&q=80',
            'rating' => $validated['rating'],
            'quote' => $validated['quote'],
            'project_title' => $validated['project_title'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:150',
            'client_position' => 'required|string|max:150',
            'company' => 'required|string|max:150',
            'location' => 'nullable|string|max:150',
            'avatar' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'quote' => 'required|string',
            'project_title' => 'nullable|string|max:200',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $testimonial->update([
            'client_name' => $validated['client_name'],
            'client_position' => $validated['client_position'],
            'company' => $validated['company'],
            'location' => $validated['location'] ?? null,
            'avatar' => $validated['avatar'] ?? $testimonial->avatar,
            'rating' => $validated['rating'],
            'quote' => $validated['quote'],
            'project_title' => $validated['project_title'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
