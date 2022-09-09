<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_sample()
    {
        $response = $this->get('/');

        User::factory()->make();

        $response->assertStatus(200);
    }

    public function test_sign_up_view(){

        $response = $this->get('/signup');

        $response->assertStatus(200);

    }

    public function test_user_register(){
        $response = $this->post('/user/register', [
            'email' => 'test.email@densss.com',
            'fullname' => 'Test User Name',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(302);

    }
}
