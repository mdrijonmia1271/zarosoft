<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_sitemap_lists_every_published_url(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200)->assertHeader('Content-Type', 'application/xml');

        $xml = $response->getContent();
        $this->assertStringContainsString('<loc>' . route('home') . '</loc>', $xml);
        $this->assertStringContainsString(route('services.show', 'erp-development'), $xml);
        $this->assertStringContainsString(route('portfolio.show', 'zaro-erp-manufacturing-system'), $xml);
        $this->assertStringContainsString(route('blog.show', 'building-scalable-erp-with-laravel-mysql'), $xml);

        // Well-formed XML, not just a string that looks close enough.
        $this->assertNotFalse(simplexml_load_string($xml));
    }

    public function test_robots_points_at_the_sitemap_and_blocks_admin(): void
    {
        $response = $this->get('/robots.txt');

        $response->assertStatus(200);
        $response->assertSee('Sitemap: ' . route('sitemap'), false);
        $response->assertSee('Disallow: /admin', false);
    }

    public function test_pages_carry_a_canonical_url(): void
    {
        $this->get('/services')
            ->assertStatus(200)
            ->assertSee('<link rel="canonical" href="' . route('services.index') . '">', false);
    }

    public function test_organization_schema_is_emitted_and_valid_json(): void
    {
        $html = $this->get('/')->assertStatus(200)->getContent();

        preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $matches);
        $this->assertNotEmpty($matches, 'No JSON-LD block found on the homepage.');

        $data = json_decode($matches[1], true);
        $this->assertSame(JSON_ERROR_NONE, json_last_error(), 'JSON-LD is not valid JSON.');

        $types = array_column($data['@graph'], '@type');
        $this->assertContains('Organization', $types);
        $this->assertContains('WebSite', $types);
    }

    public function test_faq_page_emits_faq_schema(): void
    {
        $html = $this->get('/faq')->assertStatus(200)->getContent();

        preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $matches);
        $data = json_decode($matches[1], true);

        $types = array_column($data['@graph'], '@type');
        $this->assertContains('FAQPage', $types);
    }

    public function test_blog_post_emits_article_and_breadcrumb_schema(): void
    {
        $html = $this->get('/blog/building-scalable-erp-with-laravel-mysql')->assertStatus(200)->getContent();

        preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $matches);
        $data = json_decode($matches[1], true);

        $types = array_column($data['@graph'], '@type');
        $this->assertContains('BlogPosting', $types);
        $this->assertContains('BreadcrumbList', $types);
    }

    public function test_missing_pages_render_the_branded_404(): void
    {
        $this->get('/no-such-page')
            ->assertStatus(404)
            ->assertSee('We could not find that page')
            ->assertSee('noindex, follow', false);
    }
}
