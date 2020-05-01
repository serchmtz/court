<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SetTest extends TestCase
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
    /*public function testGetAllSets()
    {
        $response = $this->json('GET','/api/all/sets');
        
        $response->assertStatus(200);
        $this->assertCount(198,$response->json());
    }*/
}
