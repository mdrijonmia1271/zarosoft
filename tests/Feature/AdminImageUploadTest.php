<?php

namespace Tests\Feature;

use App\Models\TeamMember;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminImageUploadTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
        $this->admin = User::where('email', 'admin@zarosoft.com')->firstOrFail();
        Storage::fake('public');
    }

    protected function memberPayload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Nadia Rahman',
            'designation' => 'Senior Backend Engineer',
            'role_title' => 'Platform',
            'bio' => 'Builds the queue and reporting layers behind our ERP deployments.',
            'skills' => 'Laravel, Redis, MySQL',
            'order' => 10,
            'is_active' => 1,
        ], $overrides);
    }

    public function test_uploading_an_avatar_stores_the_file_and_saves_its_path(): void
    {
        $this->actingAs($this->admin)->post('/admin/team', $this->memberPayload([
            'avatar_file' => UploadedFile::fake()->image('Nadia Rahman Portrait.jpg', 600, 750),
        ]))->assertRedirect(route('admin.team.index'));

        $member = TeamMember::where('name', 'Nadia Rahman')->firstOrFail();

        $this->assertStringStartsWith('storage/team/', $member->avatar);
        Storage::disk('public')->assertExists(str_replace('storage/', '', $member->avatar));

        // The accessor should turn the stored path into a usable URL.
        $this->assertStringContainsString('/storage/team/', $member->avatar_url);
    }

    public function test_a_typed_path_is_used_when_no_file_is_uploaded(): void
    {
        $this->actingAs($this->admin)->post('/admin/team', $this->memberPayload([
            'avatar' => 'images/team/tanvir-ahmed.jpg',
        ]))->assertRedirect(route('admin.team.index'));

        $member = TeamMember::where('name', 'Nadia Rahman')->firstOrFail();
        $this->assertSame('images/team/tanvir-ahmed.jpg', $member->avatar);
    }

    public function test_updating_without_a_new_image_keeps_the_existing_one(): void
    {
        $member = TeamMember::where('name', 'Tanvir Ahmed')->firstOrFail();
        $original = $member->avatar;

        $this->actingAs($this->admin)->put("/admin/team/{$member->id}", $this->memberPayload([
            'name' => $member->name,
            'designation' => $member->designation,
            'bio' => $member->bio,
            'avatar' => '',
        ]))->assertRedirect(route('admin.team.index'));

        $this->assertSame($original, $member->fresh()->avatar);
    }

    public function test_a_non_image_upload_is_rejected(): void
    {
        $this->actingAs($this->admin)->post('/admin/team', $this->memberPayload([
            'avatar_file' => UploadedFile::fake()->create('payload.php', 12, 'application/x-php'),
        ]))->assertSessionHasErrors('avatar_file');

        $this->assertDatabaseMissing('team_members', ['name' => 'Nadia Rahman']);
    }
}
