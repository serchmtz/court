<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;
class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->json('GET','/api/all/users');
        
        $response->assertStatus(200);
    }
    public function testGetAllUsers()
    {
        $response = $this->json('GET','/api/users');
        
        $response->assertStatus(200);
        //$this->assertCount(36,$response->json());
    }
    public function testCreateUser()
    {
        $user = factory(User::class)->make();
        
        $response = $this->json('POST','api/users',[
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'password' => $user->password,
            'remember_token'=>$user->remember_token,
            'email_verified_at' =>$user->email_verified_at,
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id','name','email','phone','role','password','remember_token','email_verified_at'
        ])->assertStatus(201);

        $this->assertDatabaseHas('users',[
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'password' => $user->password,
            'remember_token'=>$user->remember_token,
            'email_verified_at' =>$user->email_verified_at,
        ]);
    }
}
