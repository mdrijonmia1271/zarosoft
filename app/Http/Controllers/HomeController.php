<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        $featuredServices = Service::where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('order')
            ->take(6)
            ->get();

        $featuredProjects = Project::with('category')
            ->where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('order')
            ->take(3)
            ->get();

        $testimonials = Testimonial::where('is_featured', true)
            ->where('is_active', true)
            ->orderBy('order')
            ->take(3)
            ->get();

        $latestBlogs = Blog::with('category')
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $faqs = Faq::where('is_active', true)->orderBy('order')->take(6)->get();

        $heroSlides = $this->heroSlides();

        return view('home.index', compact(
            'featuredServices',
            'featuredProjects',
            'testimonials',
            'latestBlogs',
            'faqs',
            'heroSlides'
        ));
    }

    /**
     * The hero showcase: the showreel leads, then one slide per service —
     * each beat showing a single service's lead photo. A service's extra
     * photos live on its detail-page gallery, not here. Each slide carries
     * its own dwell time so the video is not cut off after an image beat.
     *
     * @return Collection<int, array<string, mixed>>
     */
    protected function heroSlides(): Collection
    {
        $slides = collect([[
            'type' => 'video',
            'src' => asset('videos/video-5.mp4'),
            'alt' => 'ZaroSoft showreel',
            'title' => null,
            'caption' => null,
            'url' => null,
            'duration' => 20000,
        ]]);

        $services = Service::where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('order')
            ->get()
            ->filter(fn (Service $service) => $service->image_url !== null);

        foreach ($services as $service) {
            $slides->push([
                'type' => 'image',
                'src' => $service->image_url,
                'alt' => $service->title . ' — ZaroSoft',
                'title' => $service->title,
                'caption' => $service->short_description,
                'url' => route('services.show', $service->slug),
                'duration' => 6000,
            ]);
        }

        return $slides->values();
    }
}
