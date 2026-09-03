<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClientLogoTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
        $this->admin = User::where('email', 'admin@zarosoft.com')->firstOrFail();
        Cache::flush();
    }

    public function test_every_client_logo_file_exists_with_a_webp_sibling(): void
    {
        $clients = Client::all();
        $this->assertCount(12, $clients);

        foreach ($clients as $client) {
            $this->assertStringStartsWith('images/clients/', $client->logo);
            $this->assertFileExists(public_path($client->logo), "Missing logo for {$client->name}.");

            $webp = preg_replace('/\.png$/', '.webp', $client->logo);
            $this->assertFileExists(public_path($webp), "Missing WebP for {$client->name}.");
        }
    }

    public function test_homepage_shows_the_client_strip_with_named_logos(): void
    {
        $html = $this->get('/')->assertStatus(200)->getContent();

        $this->assertStringContainsString('Our Clients', $html);

        // Each logo appears twice so the marquee can loop seamlessly, but only
        // the first copy carries alt text — the duplicate is decorative.
        $this->assertSame(24, substr_count($html, 'images/clients/'));
        $this->assertSame(12, substr_count($html, 'marquee-clone'));

        foreach (Client::where('is_active', true)->get() as $client) {
            $this->assertStringContainsString(
                'alt="' . e($client->name) . '"',
                $html,
                "No accessible name rendered for {$client->name}."
            );
        }
    }

    public function test_the_strip_carries_client_logos_only(): void
    {
        $html = $this->get('/')->getContent();

        // The tech-stack ticker was removed; the section is client logos alone.
        $this->assertStringNotContainsString('THE STACK WE BUILD AND SHIP ON', $html);
        $this->assertStringNotContainsString('animate-marquee-reverse', $html);
        $this->assertStringContainsString('Our Clients', $html);
    }

    public function test_logos_are_shown_in_their_own_colours(): void
    {
        $html = $this->get('/')->getContent();

        // Grayscale was dropped in favour of the real brand colours.
        $this->assertStringNotContainsString('grayscale', $html);
    }

    public function test_the_strip_disappears_when_no_client_is_visible(): void
    {
        Client::query()->update(['is_active' => false]);
        Cache::flush();

        $html = $this->get('/')->assertStatus(200)->getContent();

        $this->assertStringNotContainsString('Our Clients', $html);
        $this->assertStringNotContainsString('images/clients/', $html);
    }

    public function test_hiding_a_client_removes_it_from_the_strip(): void
    {
        Client::where('slug', 'uhcd')->update(['is_active' => false]);
        Cache::flush();

        $html = $this->get('/')->getContent();
        $this->assertStringNotContainsString('images/clients/uhcd.png', $html);
        $this->assertStringContainsString('images/clients/chrf.png', $html);
    }

    public function test_admin_can_add_a_client_logo_by_upload(): void
    {
        Storage::fake('public');

        $this->actingAs($this->admin)->post('/admin/clients', [
            'name' => 'Northwind Traders',
            'website_url' => 'https://example.com',
            'order' => 20,
            'is_active' => 1,
            'logo_file' => UploadedFile::fake()->image('northwind-logo.png', 400, 120),
        ])->assertRedirect(route('admin.clients.index'));

        $client = Client::where('slug', 'northwind-traders')->firstOrFail();
        $this->assertStringStartsWith('storage/clients/', $client->logo);
        Storage::disk('public')->assertExists(str_replace('storage/', '', $client->logo));
    }

    public function test_a_client_cannot_be_created_without_a_logo(): void
    {
        $this->actingAs($this->admin)
            ->post('/admin/clients', ['name' => 'No Logo Ltd'])
            ->assertSessionHasErrors('logo');

        $this->assertDatabaseMissing('clients', ['slug' => 'no-logo-ltd']);
    }

    public function test_admin_client_screens_load(): void
    {
        $client = Client::first();

        $this->actingAs($this->admin)->get('/admin/clients')->assertStatus(200);
        $this->actingAs($this->admin)->get('/admin/clients/create')->assertStatus(200);
        $this->actingAs($this->admin)->get("/admin/clients/{$client->id}/edit")->assertStatus(200);
    }
}
