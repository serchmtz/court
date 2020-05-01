<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerTest extends TestCase
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
   /* public function testGetAllPlayers()
    {
        $response = $this->json('GET','/api/all/players');
        
        $response->assertStatus(200);
        $this->assertCount(32,$response->json());
    }*/
}
