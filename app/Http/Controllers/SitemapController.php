<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * XML sitemap covering every indexable public URL. Generated on request
     * and cached by the response headers rather than written to disk, so new
     * content published from the admin panel shows up without a build step.
     */
    public function index(): Response
    {
        $urls = [
            ['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('services.index'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => route('ai.index'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('solutions.index'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('products.index'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('portfolio.index'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('blog.index'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => route('faq.index'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => route('contact.index'), 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        foreach (Service::where('is_active', true)->get(['slug', 'updated_at']) as $service) {
            $urls[] = [
                'loc' => route('services.show', $service->slug),
                'lastmod' => $service->updated_at?->toAtomString(),
                'priority' => '0.8',
                'changefreq' => 'monthly',
            ];
        }

        foreach (Project::where('is_active', true)->get(['slug', 'updated_at']) as $project) {
            $urls[] = [
                'loc' => route('portfolio.show', $project->slug),
                'lastmod' => $project->updated_at?->toAtomString(),
                'priority' => '0.7',
                'changefreq' => 'monthly',
            ];
        }

        foreach (Blog::where('is_published', true)->get(['slug', 'updated_at']) as $post) {
            $urls[] = [
                'loc' => route('blog.show', $post->slug),
                'lastmod' => $post->updated_at?->toAtomString(),
                'priority' => '0.7',
                'changefreq' => 'monthly',
            ];
        }

        return response()
            ->view('sitemap', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }

    /**
     * robots.txt is served dynamically so it can point at the sitemap using
     * whatever host the site is actually running on.
     */
    public function robots(): Response
    {
        $lines = [
            'User-agent: *',
            'Disallow: /admin',
            'Disallow: /login',
            '',
            'Sitemap: ' . route('sitemap'),
        ];

        return response(implode("\n", $lines) . "\n")
            ->header('Content-Type', 'text/plain');
    }
}
