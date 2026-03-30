<?php

namespace Tests\Feature;

use App\Models\HomepageContent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_admin_login(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_non_admin_user_cannot_access_dashboard(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertForbidden();
    }

    public function test_admin_can_update_homepage_content(): void
    {
        $admin = User::factory()->admin()->create();
        HomepageContent::current();

        $payload = [
            'topbar_text' => 'New topbar text',
            'brand_name' => 'Caracal Elite',
            'brand_sub' => 'Safari Company',
            'phone_number' => '+254 700 111 222',
            'quote_email' => 'quotes@example.com',
            'hero_badge' => 'Custom Badge',
            'hero_title' => 'Custom Hero Title',
            'hero_description' => 'Custom hero description for admin update test.',
            'hero_image_url' => 'https://example.com/hero.jpg',
            'destination_intro' => 'Updated destination intro copy.',
            'destination_cards' => [
                [
                    'title' => 'Kenya',
                    'subtitle' => 'Big Five',
                    'image_url' => 'https://example.com/kenya.jpg',
                    'offer_label' => '20% Off',
                ],
            ],
            'safari_cards' => [
                [
                    'title' => 'Kenya Safaris',
                    'image_url' => 'https://example.com/safari.jpg',
                ],
            ],
            'contact_title' => 'Plan your safari',
            'contact_text' => 'Reach us today for your quote.',
        ];

        $response = $this->actingAs($admin)->put(route('admin.homepage.update'), $payload);

        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('status');

        $this->assertDatabaseHas('homepage_contents', [
            'topbar_text' => 'New topbar text',
            'brand_name' => 'Caracal Elite',
            'quote_email' => 'quotes@example.com',
            'updated_by' => $admin->id,
        ]);
    }
}

