<?php

namespace Tests\Feature;

use App\Models\TeamMember;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamSectionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_about_page_lists_every_active_team_member(): void
    {
        $html = $this->get('/about')->assertStatus(200)->getContent();

        $this->assertSame(10, TeamMember::where('is_active', true)->count());
        $this->assertSame(10, substr_count($html, '<article class="group'));

        foreach (TeamMember::where('is_active', true)->get() as $member) {
            $this->assertStringContainsString($member->name, $html);
        }
    }

    public function test_founders_are_listed_before_the_rest_of_the_team(): void
    {
        $html = $this->get('/about')->getContent();

        $lastFounder = strpos($html, 'Sabbir Hossain');
        $firstNonFounder = strpos($html, 'Nusrat Jahan');

        $this->assertNotFalse($lastFounder);
        $this->assertNotFalse($firstNonFounder);
        $this->assertLessThan($firstNonFounder, $lastFounder);
    }

    public function test_only_actual_founders_are_labelled_co_founder(): void
    {
        $html = $this->get('/about')->getContent();

        // Read the role pill out of each card rather than counting the raw
        // string — founder job titles also contain the words "Co-Founder".
        preg_match_all('#backdrop-blur-sm border border-white/15[^>]*>\s*([^<]+?)\s*</span>#', $html, $matches);
        $pills = $matches[1];

        $this->assertCount(10, $pills);
        $this->assertSame(4, TeamMember::where('is_founder', true)->count());
        $this->assertSame(4, count(array_filter($pills, fn ($pill) => $pill === 'Co-Founder')));
        $this->assertSame(['Co-Founder', 'Co-Founder', 'Co-Founder', 'Co-Founder'], array_slice($pills, 0, 4));

        // Non-founders show their own discipline instead.
        $this->assertStringContainsString('Quality Engineering', $html);
        $this->assertStringContainsString('Infrastructure &amp; Reliability', $html);
    }

    public function test_every_team_member_has_a_locally_hosted_portrait(): void
    {
        foreach (TeamMember::where('is_active', true)->get() as $member) {
            $this->assertNotEmpty($member->avatar, "{$member->name} has no avatar.");
            $this->assertStringStartsWith('images/team/', $member->avatar);
            $this->assertFileExists(public_path($member->avatar), "Missing portrait for {$member->name}.");

            // The <picture> element needs the WebP sibling to be worth using.
            $webp = preg_replace('/\.jpg$/', '.webp', $member->avatar);
            $this->assertFileExists(public_path($webp), "Missing WebP for {$member->name}.");
        }
    }

    public function test_deactivating_a_member_removes_them_from_the_page(): void
    {
        TeamMember::where('name', 'Arif Hossain')->update(['is_active' => false]);

        $this->get('/about')
            ->assertStatus(200)
            ->assertDontSee('Arif Hossain')
            ->assertSee('Mohammad Zaid');
    }
}
