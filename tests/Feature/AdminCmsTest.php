<?php

namespace Tests\Feature;

use App\Models\Industry;
use App\Models\Product;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCmsTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
        $this->admin = User::where('email', 'admin@zarosoft.com')->firstOrFail();
    }

    public function test_admin_can_reach_the_new_cms_sections(): void
    {
        foreach (['/admin/products', '/admin/products/create', '/admin/industries', '/admin/industries/create'] as $url) {
            $this->actingAs($this->admin)->get($url)->assertStatus(200);
        }
    }

    public function test_admin_can_create_update_and_delete_a_product(): void
    {
        $this->actingAs($this->admin)->post('/admin/products', [
            'name' => 'ZaroDesk',
            'tagline' => 'Helpdesk and ticketing for support teams',
            'status' => 'Beta',
            'description' => 'Shared inbox, SLA timers and CSAT reporting.',
            'highlights' => "Shared inbox\nSLA timers\nCSAT reporting",
            'icon' => 'briefcase',
            'order' => 9,
            'is_active' => 1,
        ])->assertRedirect(route('admin.products.index'));

        $product = Product::where('slug', 'zarodesk')->firstOrFail();
        $this->assertSame(['Shared inbox', 'SLA timers', 'CSAT reporting'], $product->highlights);
        $this->assertSame('Beta', $product->status);

        // It should now appear on the public product suite page.
        $this->get('/products')->assertStatus(200)->assertSee('ZaroDesk');

        $this->actingAs($this->admin)->put("/admin/products/{$product->id}", [
            'name' => 'ZaroDesk',
            'slug' => 'zarodesk',
            'tagline' => 'Helpdesk and ticketing for support teams',
            'status' => 'Enterprise Ready',
            'highlights' => "Shared inbox",
            'order' => 9,
            'is_active' => 1,
        ])->assertRedirect(route('admin.products.index'));

        $this->assertSame('Enterprise Ready', $product->fresh()->status);

        $this->actingAs($this->admin)->delete("/admin/products/{$product->id}");
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_admin_can_create_an_industry_solution(): void
    {
        $this->actingAs($this->admin)->post('/admin/industries', [
            'name' => 'Hospitality & Travel',
            'headline' => 'Booking engines and property management',
            'summary' => 'Reservations, channel manager sync and guest CRM.',
            'features' => "Channel manager\nGuest CRM\nDynamic pricing",
            'icon' => 'globe',
            'accent' => 'cyan',
            'order' => 7,
            'is_active' => 1,
        ])->assertRedirect(route('admin.industries.index'));

        $industry = Industry::where('slug', 'hospitality-travel')->firstOrFail();
        $this->assertCount(3, $industry->features);
        $this->assertSame('from-cyan-600 to-blue-600', $industry->gradient);

        $this->get('/solutions')->assertStatus(200)->assertSee('Hospitality &amp; Travel', false);
    }

    public function test_industry_accent_must_be_a_known_option(): void
    {
        $this->actingAs($this->admin)->post('/admin/industries', [
            'name' => 'Bad Accent',
            'headline' => 'Should fail validation',
            'accent' => 'chartreuse',
        ])->assertSessionHasErrors('accent');

        $this->assertDatabaseMissing('industries', ['slug' => 'bad-accent']);
    }

    public function test_hidden_records_stay_off_the_public_pages(): void
    {
        Product::where('slug', 'zaroerp')->update(['is_active' => false]);
        Industry::where('slug', 'manufacturing')->update(['is_active' => false]);

        $this->get('/products')->assertStatus(200)->assertDontSee('ZaroERP');
        $this->get('/solutions')->assertStatus(200)->assertDontSee('Manufacturing &amp; Heavy Industries', false);
    }
}
