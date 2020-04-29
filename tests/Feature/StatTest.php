<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllStats()
    {
        $response = $this->json('GET','/api/all/stats');
        
        $response->assertStatus(200);
        $this->assertCount(36,$response->json());
    }
}
