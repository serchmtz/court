<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatchTest extends TestCase
{
    use RefreshDatabase;
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
    public function testGetAllMatches()
    {
        $response = $this->json('GET','/api/all/matches');
        $response->assertStatus(200); 
    }
    public function testGetMatches()
    {
        $response = $this->json('GET','/api/matches');
        $response->assertStatus(200); 
    }
}
