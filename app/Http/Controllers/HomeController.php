<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $serviceCategories = ServiceCategory::with(['activeServices'])->where('is_active', true)->orderBy('order')->get();
        $featuredServices = Service::with('category')->where('is_featured', true)->where('is_active', true)->orderBy('order')->take(6)->get();
        $featuredProjects = Project::with('category')->where('is_featured', true)->where('is_active', true)->orderBy('order')->take(4)->get();
        $founders = TeamMember::where('is_founder', true)->where('is_active', true)->orderBy('order')->get();
        $testimonials = Testimonial::where('is_featured', true)->where('is_active', true)->orderBy('order')->take(4)->get();
        $latestBlogs = Blog::with('category')->where('is_published', true)->orderBy('published_at', 'desc')->take(3)->get();
        $faqs = Faq::where('is_active', true)->orderBy('order')->take(6)->get();

        return view('home.index', compact(
            'serviceCategories',
            'featuredServices',
            'featuredProjects',
            'founders',
            'testimonials',
            'latestBlogs',
            'faqs'
        ));
    }
}
