<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StatTest extends TestCase
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
    /*public function testGetAllStats()
    {
        $response = $this->json('GET','/api/all/stats');
        
        $response->assertStatus(200);
        $this->assertCount(36,$response->json());
    }*/
}
