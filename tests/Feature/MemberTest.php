<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MemberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllMembers()
    {
        $response = $this->json('GET','/api/all/members');
        
        $response->assertStatus(200);
        $this->assertCount(24,$response->json());
    }
}
