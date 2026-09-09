<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::with('category')
            ->where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('order')
            ->take(4)
            ->get();

        $testimonials = Testimonial::where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('order')
            ->take(4)
            ->get();

        $latestBlogs = Blog::with('category')
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $faqs = Faq::where('is_active', true)->orderBy('order')->take(6)->get();

        return view('home.index', compact(
            'featuredProjects',
            'testimonials',
            'latestBlogs',
            'faqs'
        ));
    }
}
