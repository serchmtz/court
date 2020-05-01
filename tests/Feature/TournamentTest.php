<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TournamentTest extends TestCase
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
    /*public function testExample()
    {
        $response = $this->json('GET','/api/all/tournaments');
        
        $response->assertStatus(200);
        $this->assertCount(4,$response->json());
    }*/
}
