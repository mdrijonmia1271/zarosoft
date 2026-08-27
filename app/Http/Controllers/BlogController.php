<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = BlogCategory::withCount('blogs')->get();
        $tags = Tag::all();
        $featuredPost = Blog::with('category')->where('is_featured', true)->where('is_published', true)->first();

        $query = Blog::with(['category', 'tags'])->where('is_published', true)->orderBy('published_at', 'desc');

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

        $blogs = $query->paginate(6)->withQueryString();

        return view('blog.index', compact('blogs', 'categories', 'tags', 'featuredPost'));
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
