<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_cant_view_users_for_not_authorized(): void
    {
        $response = $this->getJson('/api/v1/users');

        $response->assertStatus(401);
    }

    public function test_can_view_users_for_authorized(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->getJson('/api/v1/users');

        $response->assertStatus(200);
    }

    public function test_get_user_by_id(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->getJson('/api/v1/users/1');

        $response->assertStatus(200);
    }

    public function test_can_create_user(): void
    {
        $user = User::factory()->create();
        $user_2 = User::factory()->make();
        $response = $this->actingAs($user)->postJson('/api/v1/users', [
            'name' => $user_2->name,
            'email' => $user_2->email,
            'password' => $user_2->password,
            'password_confirmation' => $user_2->password,
        ]);

        $response->assertStatus(200);
    }

    public function test_can_update_user(): void
    {
        $user = User::factory()->create();
        $user_2 = User::factory()->create();
        $response = $this->actingAs($user)->putJson("/api/v1/users/{$user_2->id}", [
            'name' => 'alexey',
        ]);

        $response->assertStatus(200);
    }

    public function test_can_delete_user(): void
    {
        $user = User::factory()->create();
        $user_2 = User::factory()->create();
        $response = $this->actingAs($user)->deleteJson("/api/v1/users/{$user_2->id}");

        $response->assertStatus(200);
    }
}
