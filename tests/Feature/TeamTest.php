<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeamTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /*public function testGetAllTeams()
    {
        $response = $this->json('GET','/api/all/teams');
        
        $response->assertStatus(200);
        $this->assertCount(12,$response->json());
    }*/
}
