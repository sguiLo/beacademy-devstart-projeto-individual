<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->actingAs($user);

        $response = $this->get('/elenco');

        $response->assertStatus(200);
    }

    public function test_user_cant_login()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        if (!$response = $this->get('/usuarios/' . $user->id)) {
            $response->assertRedirect('/login');
        }

        $this->assertGuest();
    }

    public function test_user_create()
    {
        $user = User::factory()->create();

        $response = $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/usuarios/' . $user->id);

        $response->assertStatus(200);
    }

    public function test_user_edit()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->put('/usuarios/' . $user->id, [
            'name' => 'Usuário editado',
            'password' => 'Senhanova123',
        ]);

        $response = $this->get('/usuarios/' . $user->id,);

        $response->assertStatus(200);
    }

    public function test_user_delete()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->delete('/usuarios/' . $user->id);

        $response = $this->get('/usuarios/' . $user->id);

        $response->assertStatus(200);
    }
}
