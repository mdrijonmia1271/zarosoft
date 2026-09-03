<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::orderBy('order')->paginate(15);

        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create', ['accents' => array_keys(Industry::ACCENTS)]);
    }

    public function store(Request $request)
    {
        Industry::create($this->validated($request));

        return redirect()->route('admin.industries.index')->with('success', 'Industry solution created successfully.');
    }

    public function edit(Industry $industry)
    {
        return view('admin.industries.edit', [
            'industry' => $industry,
            'accents' => array_keys(Industry::ACCENTS),
        ]);
    }

    public function update(Request $request, Industry $industry)
    {
        $industry->update($this->validated($request, $industry));

        return redirect()->route('admin.industries.index')->with('success', 'Industry solution updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();

        return redirect()->route('admin.industries.index')->with('success', 'Industry solution deleted successfully.');
    }

    /**
     * Core modules arrive as one per line and are stored as JSON.
     */
    protected function validated(Request $request, ?Industry $industry = null): array
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'nullable|string|max:150|unique:industries,slug' . ($industry ? ',' . $industry->id : ''),
            'icon' => 'nullable|string|max:50',
            'headline' => 'required|string|max:200',
            'summary' => 'nullable|string',
            'features' => 'nullable|string',
            'accent' => ['nullable', Rule::in(array_keys(Industry::ACCENTS))],
            'order' => 'nullable|integer|min:0',
        ]);

        $features = array_values(array_filter(array_map(
            'trim',
            preg_split('/\r\n|\r|\n/', (string) ($validated['features'] ?? ''))
        )));

        return [
            'name' => $validated['name'],
            'slug' => Str::slug(($validated['slug'] ?? '') ?: $validated['name']),
            'icon' => ($validated['icon'] ?? '') ?: 'layers',
            'headline' => $validated['headline'],
            'summary' => $validated['summary'] ?? null,
            'features' => $features,
            'accent' => $validated['accent'] ?? 'blue',
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ];
    }
}
