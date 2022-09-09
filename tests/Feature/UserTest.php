<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_sign_up_view(){
        

        $response = $this->get('/signup');

        $response->assertStatus(200);

    }

    public function test_user_register_should_fail(){

        $user = User::factory()->make();

        $response = $this->post('/user/register', [
            'email' => $user->email,
            'fullname' => $user->fullname,
            'password' => 'passwors',
            'password_confirmation' => 'passwords'
        ]);
        
        $response->assertSessionHasErrors();
    }

    public function test_user_register_should_succeed(){
        $user = User::factory()->make();
        
        $response = $this->post('/user/register', [
            'email' => $user->email,
            'fullname' => $user->fullname,
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertRedirect('/blog');
        $response->assertSessionHasNoErrors();

    }

    public function test_user_logout(){
        $response = $this->get('/user/logout');

        $response->assertRedirect('');
        $response->assertSessionHasNoErrors();
        $this->assertGuest();
    }

    public function test_user_login_should_fail(){

        $user = User::factory()->create();

        $response = $this->post('/user/login', [
            'email' => $user->email,
            'password' => 'wrong pass',
        ]);

        $response->assertSessionHasErrors();
    }

    public function test_user_login_should_succeed(){
        $user = User::factory()->create();

        $response = $this->post('/user/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertAuthenticated();
    }

    
}
