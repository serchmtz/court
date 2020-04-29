<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SetTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllSets()
    {
        $response = $this->json('GET','/api/all/sets');
        
        $response->assertStatus(200);
        $this->assertCount(198,$response->json());
    }
}
