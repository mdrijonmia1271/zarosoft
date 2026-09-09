<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\ContactRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        $this->shareLayoutData();
    }

    /**
     * Data the public layout and admin chrome need. These are composers rather
     * than View::share so the queries run when a view is actually rendered —
     * sharing at boot would hit the database on every request (sitemap.xml and
     * robots.txt included) and would freeze the values before the request runs.
     */
    protected function shareLayoutData(): void
    {
        View::composer(
            ['layouts.navigation', 'layouts.footer', 'admin.layouts.app'],
            fn ($view) => $view->with('activeServiceCount', $this->activeServiceCount())
        );

        View::composer('home.index', function ($view) {
            $view->with('clientLogos', $this->clientLogos());
        });

        View::composer(['layouts.navigation', 'layouts.footer'], function ($view) {
            $view->with('navServices', $this->navServices());
        });

        View::composer('admin.layouts.app', function ($view) {
            $view->with('newLeadsCount', $this->newLeadsCount());
        });
    }

    /**
     * Client logos for the "trusted by" strip, managed in Admin → Client Logos.
     */
    protected function clientLogos()
    {
        return Cache::remember('layout.clients', now()->addHour(), function () {
            if (!Schema::hasTable('clients')) {
                return collect();
            }

            return Client::where('is_active', true)->orderBy('order')->orderBy('name')->get();
        });
    }

    protected function activeServiceCount(): int
    {
        return Cache::remember('layout.active_service_count', now()->addHour(), function () {
            return Schema::hasTable('services')
                ? Service::where('is_active', true)->count()
                : 0;
        });
    }

    /**
     * Featured services grouped by their category, for the header mega menu
     * and the footer capability list. Driven by the database so renaming or
     * retiring a service can never leave a dead link in the chrome.
     */
    protected function navServices()
    {
        return Cache::remember('layout.nav_services', now()->addHour(), function () {
            if (!Schema::hasTable('services')) {
                return collect();
            }

            return Service::with('category')
                ->where('is_active', true)
                ->where('is_featured', true)
                ->orderBy('order')
                ->get()
                ->groupBy(fn (Service $service) => $service->category?->name ?? 'Capabilities');
        });
    }

    protected function newLeadsCount(): int
    {
        return Schema::hasTable('contact_requests')
            ? ContactRequest::where('status', 'new')->count()
            : 0;
    }
}
