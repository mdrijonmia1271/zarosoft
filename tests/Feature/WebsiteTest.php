<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_all_public_pages_return_successful_response(): void
    {
        $urls = [
            '/',
            '/about',
            '/services',
            '/services/website-development',
            '/services/mobile-app-development',
            '/services/erp-development',
            '/services/ai-solutions',
            '/services/ui-ux-design',
            '/services/brand-identity',
            '/ai-solutions',
            '/solutions',
            '/products',
            '/portfolio',
            '/portfolio/zaro-erp-manufacturing-system',
            '/portfolio/neuralbot-ai-document-ocr',
            '/blog',
            '/blog/building-scalable-erp-with-laravel-mysql',
            '/faq',
            '/contact',
            '/admin/login',
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }

    public function test_contact_form_submission_creates_lead(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Test Client',
            'email' => 'client@test.com',
            'phone' => '+880 1700-999999',
            'company' => 'Test Enterprises Ltd',
            'service_interest' => 'ERP Development',
            'budget_range' => '$5,000 - $10,000',
            'message' => 'We need a custom factory ERP with multi-warehouse and accounting.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('contact_requests', [
            'email' => 'client@test.com',
            'service_interest' => 'ERP Development',
        ]);
    }

    public function test_admin_dashboard_requires_authentication(): void
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_admin_can_access_dashboard_and_crud(): void
    {
        $user = User::where('email', 'admin@zarosoft.com')->first();
        
        $this->actingAs($user)->get('/admin/dashboard')->assertStatus(200);
        $this->actingAs($user)->get('/admin/leads')->assertStatus(200);
        $this->actingAs($user)->get('/admin/services')->assertStatus(200);
        $this->actingAs($user)->get('/admin/projects')->assertStatus(200);
        $this->actingAs($user)->get('/admin/blogs')->assertStatus(200);
        $this->actingAs($user)->get('/admin/team')->assertStatus(200);
        $this->actingAs($user)->get('/admin/testimonials')->assertStatus(200);
        $this->actingAs($user)->get('/admin/faqs')->assertStatus(200);
        $this->actingAs($user)->get('/admin/settings')->assertStatus(200);
    }
}
