<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllUsers()
    {
        $response = $this->json('GET','/api/all/users');
        
        $response->assertStatus(200);
        $this->assertCount(36,$response->json());
    }
}
