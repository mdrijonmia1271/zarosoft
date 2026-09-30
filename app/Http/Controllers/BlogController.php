<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $filtered = $request->hasAny(['category', 'tag', 'search']);

        // The newest featured post leads the page as the banner and stays out
        // of the grid; a filtered view is just the grid.
        $lead = $filtered ? null : Blog::with('category')
            ->where('is_published', true)
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->first();

        $featuredPost = $request->integer('page', 1) > 1 ? null : $lead;

        $query = Blog::with(['category', 'tags'])
            ->where('is_published', true)
            ->when($lead, fn ($q) => $q->whereKeyNot($lead->id))
            ->orderBy('published_at', 'desc');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $blogs = $query->paginate(8)->withQueryString();

        return view('blog.index', compact('blogs', 'featuredPost', 'filtered'));
    }

    public function show(string $slug)
    {
        $blog = Blog::with(['category', 'tags'])->where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        $blog->increment('views_count');

        $relatedBlogs = Blog::with('category')
            ->where('id', '!=', $blog->id)
            ->where('is_published', true)
            ->where('blog_category_id', $blog->blog_category_id)
            ->take(3)
            ->get();

        if ($relatedBlogs->isEmpty()) {
            $relatedBlogs = Blog::with('category')->where('id', '!=', $blog->id)->where('is_published', true)->take(3)->get();
        }

        return view('blog.show', compact('blog', 'relatedBlogs'));
    }
}
