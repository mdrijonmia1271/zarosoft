<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('category')->orderBy('order')->paginate(20);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:100',
            'question' => 'required|string|max:300',
            'answer' => 'required|string',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        Faq::create([
            'category' => $validated['category'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ added successfully.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:100',
            'question' => 'required|string|max:300',
            'answer' => 'required|string',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $faq->update([
            'category' => $validated['category'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
