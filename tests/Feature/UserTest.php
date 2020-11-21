<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp(): void {
        parent::setUp();
        $this->artisan('passport:install');
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllUsers()
    {


        $response = $this->json('GET','/api/users');
        $response->assertStatus(200);
    }
    public function testCreateUser()
    {

        $user = factory(User::class)->create();
        $response = $this->json('POST','/api/users',[
            
            'name' => $user->name,
            'email' => 'test@test.com',
            'phone' => '222-222-2222',
            'role' => $user->role,
            'password' => $user->password,
            'c_password' =>$user->password
        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'data'=> [
                'user' => [
                    'id',
                    'name',
                    'email',
                    'phone',
                    'role',
                    'status',
                    'password',
                    'created_at',
                    'updated_at'
                ]
            ],
        ])->assertStatus(201);

        $this->assertDatabaseHas('users',[
            'name' => $user->name,
            'email' => 'test@test.com',
            'phone' => '222-222-2222',
            'role' => $user->role,
            'status' => 'active'
        ]);
    }
    public function testUpdateUser()
    {    
        $user = factory(User::class)->create();
        $new_user = factory(User::class)->make();
        
        $response = $this->json('PUT','/api/users/'.$user->id, [
            'name' => $new_user->name,
            'email' => $new_user->email,
            'phone' => '222-222-2222',
            'role' => $new_user->role,
            'password' => $new_user->password,
            'status' => $new_user->status
        ]);       
        $response->assertJsonStructure([
            'data'=> [
                'id',
                'name',
                'email',
                'phone',
                'role',
                'status',
                'email_verified_at',
                'created_at',
                'updated_at'
                ]
        ])->assertStatus(200);
        $this->assertDatabaseHas('users',[
            'id' => $user->id,
            'name' => $new_user->name,
            'email' => $new_user->email,
            'phone' => '222-222-2222',
            'role' => $new_user->role,
            'status' => $user->status,
        ]);
        
    }
    public function testReadUser()
    {
        $user = factory(User::class)->create(); 
        $response = $this->json('GET','/api/users/'.$user->id);
        $response->assertStatus(200)
                ->assertJsonStructure([
                    'data'=>[
                        'id',
                        'name',
                        'email',
                        'phone',
                        'role',
                        'status',
                        'email_verified_at',
                        'created_at',
                        'updated_at'
                    ]
                ]);
        $this->assertDatabaseHas('users',[
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'status' => $user->status,
            'email_verified_at' => $user->email_verified_at,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ]);
    }
    public function testdeleteUser()
    {
        $user = factory(User::class)->create();
        $user->status="active";
        $response = $this->json('delete','/api/users/'.$user->id);
        
        $response->assertStatus(202)
                ->assertJsonStructure([
                    'message'
                ]);
        $this->assertDatabaseHas('users',[
            'id' => $user->id,
            'status' => 'inactive',
        ]);     
    }
}
