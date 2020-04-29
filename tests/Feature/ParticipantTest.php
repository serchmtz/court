<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParticipantTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllParticipants()
    {
        $response = $this->json('GET','/api/all/participants');
        
        $response->assertStatus(200);
        $this->assertCount(44,$response->json());
    }
}
