<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesImageUploads;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $blogs = Blog::with('category')->orderBy('published_at', 'desc')->paginate(15);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        $tags = Tag::all();
        return view('admin.blogs.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:250',
            'slug' => 'nullable|string|max:250|unique:blogs,slug',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'cover_image' => 'nullable|string|max:2048',
            'cover_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
            'author_name' => 'required|string|max:100',
            'read_time' => 'required|string|max:50',
            'tags' => 'nullable|array',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        $blog = Blog::create([
            'blog_category_id' => $validated['blog_category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'cover_image' => $this->resolveImageField($request, 'cover_image', 'blog'),
            'author_name' => $validated['author_name'],
            'read_time' => $validated['read_time'],
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published', true),
            'published_at' => $request->boolean('is_published') ? now() : null,
        ]);

        if ($request->has('tags')) {
            $blog->tags()->sync($request->tags);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article published successfully.');
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();
        $tags = Tag::all();
        return view('admin.blogs.edit', compact('blog', 'categories', 'tags'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:250',
            'slug' => 'nullable|string|max:250|unique:blogs,slug,' . $blog->id,
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'cover_image' => 'nullable|string|max:2048',
            'cover_image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:4096',
            'author_name' => 'required|string|max:100',
            'read_time' => 'required|string|max:50',
            'tags' => 'nullable|array',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        $blog->update([
            'blog_category_id' => $validated['blog_category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'cover_image' => $this->resolveImageField($request, 'cover_image', 'blog', $blog->cover_image),
            'author_name' => $validated['author_name'],
            'read_time' => $validated['read_time'],
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published', true),
        ]);

        if ($request->has('tags')) {
            $blog->tags()->sync($request->tags);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog article deleted successfully.');
    }
}
