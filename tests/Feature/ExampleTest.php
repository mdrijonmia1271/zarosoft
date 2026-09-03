<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The public pages are driven by the CMS, so they must still render on a
     * freshly migrated database with no content in it at all — that is what a
     * new install looks like before the seeder or the admin panel is used.
     */
    public function test_public_pages_render_on_an_empty_database(): void
    {
        foreach (['/', '/about', '/services', '/portfolio', '/blog', '/faq', '/contact', '/products', '/solutions'] as $url) {
            $this->get($url)->assertStatus(200);
        }
    }
}
