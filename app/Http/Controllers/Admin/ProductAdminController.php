<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('order')->paginate(15);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($this->validated($request, $product));

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Highlights arrive as one bullet per line and are stored as JSON.
     */
    protected function validated(Request $request, ?Product $product = null): array
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'slug' => 'nullable|string|max:120|unique:products,slug' . ($product ? ',' . $product->id : ''),
            'tagline' => 'required|string|max:200',
            'status' => 'required|string|max:60',
            'description' => 'nullable|string',
            'highlights' => 'nullable|string',
            'demo_url' => 'nullable|url|max:255',
            'icon' => 'nullable|string|max:50',
            'order' => 'nullable|integer|min:0',
        ]);

        $highlights = array_values(array_filter(array_map(
            'trim',
            preg_split('/\r\n|\r|\n/', (string) ($validated['highlights'] ?? ''))
        )));

        return [
            'name' => $validated['name'],
            'slug' => Str::slug(($validated['slug'] ?? '') ?: $validated['name']),
            'tagline' => $validated['tagline'],
            'status' => $validated['status'],
            'description' => $validated['description'] ?? null,
            'highlights' => $highlights,
            'demo_url' => $validated['demo_url'] ?? null,
            'icon' => ($validated['icon'] ?? '') ?: 'package',
            'order' => $validated['order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ];
    }
}
