<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllMatches()
    {
        $response = $this->json('GET','/api/all/matches');
        $response->assertStatus(200);
        $this->assertCount(36,$response->json());
    }
}
