<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_via_api(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'newuser@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'user' => ['id', 'name', 'email', 'role'],
                'access_token',
                'token_type',
            ]);

        $this->assertDatabaseHas('users', [
            'email' => 'newuser@example.com',
            'role' => 'user',
        ]);
    }

    public function test_user_can_login_via_api(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'user',
                'access_token',
                'token_type',
            ]);
    }
}
