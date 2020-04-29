<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFetchAllPlayers()
    {
        $response = $this->json('GET','/api/all/players');
        
        $response->assertStatus(200);
        $this->assertCount(32,$response->json());
    }
}
