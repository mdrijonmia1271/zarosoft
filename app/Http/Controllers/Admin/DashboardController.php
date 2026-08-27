<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactRequest;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLeads = ContactRequest::count();
        $newLeadsCount = ContactRequest::where('status', 'new')->count();
        $totalServices = Service::count();
        $totalProjects = Project::count();
        $totalBlogs = Blog::count();
        $totalTestimonials = Testimonial::count();

        $leadsByStatus = [
            'new' => ContactRequest::where('status', 'new')->count(),
            'contacted' => ContactRequest::where('status', 'contacted')->count(),
            'discussion' => ContactRequest::where('status', 'discussion')->count(),
            'proposal' => ContactRequest::where('status', 'proposal')->count(),
            'won' => ContactRequest::where('status', 'won')->count(),
            'lost' => ContactRequest::where('status', 'lost')->count(),
        ];

        $recentLeads = ContactRequest::orderBy('created_at', 'desc')->take(6)->get();
        $recentBlogs = Blog::with('category')->orderBy('created_at', 'desc')->take(4)->get();

        return view('admin.dashboard.index', compact(
            'totalLeads',
            'newLeadsCount',
            'totalServices',
            'totalProjects',
            'totalBlogs',
            'totalTestimonials',
            'leadsByStatus',
            'recentLeads',
            'recentBlogs'
        ));
    }
}
