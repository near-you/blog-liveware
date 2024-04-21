<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_get_all_users()
    {
        $user = factory(User::class, 3)->create();
        dd($user);
//        $user = User::factory()->create();
//
//        $response = $this->get('/app/users');
//
//        $response->assertStatus(200);
//        $response->assertJson([$user->toArray()]);
    }

    /** @test */
    public function it_can_create_a_user()
    {
        $userData = [
            'name' => 'Іван Петров',
            'email' => 'ivan@example.com',
            'password' => 'пароль',
        ];

        $response = $this->post('/users', $userData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => 'ivan@example.com']);
    }
}