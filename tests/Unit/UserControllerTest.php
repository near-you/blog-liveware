<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
//    use RefreshDatabase;

    /**
     * Тест на перевірку чи можна створити користувача.
     *
     * @return void
     */
    public function testCanCreateUser()
    {
// Створюємо нового користувача
//         $user = User::factory()->create([
//             'name' => 'John Doe',
//             'email' => 'john@example.com',
//         ]);

// // Перевіряємо, чи був створений користувач
//         $this->assertEquals('users', [
//             'name' => 'John Doe',
//             'email' => 'john@example.com',
//         ]);

//        $this->assertDatabaseHas('users', [
//            'name' => 'John Doe',
//            'email' => 'john@example.com',
//        ]);
    }

    /**
     * Тест на перевірку чи можна оновити ім'я користувача.
     *
     * @return void
     */
    public function testCanUpdateUserName()
    {
// Створюємо нового користувача
//         $user = User::factory()->create();

// // Оновлюємо ім'я користувача
//         $user->update(['name' => 'Jane Doe']);

// // Перевіряємо, чи було оновлено ім'я користувача
//         $this->assertEquals('Jane Doe', $user->fresh()->name);
    }
}
