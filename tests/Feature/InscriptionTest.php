<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InscriptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllInscriptions()
    {
        $response = $this->json('GET','/api/all/inscriptions');
        
        $response->assertStatus(200);
        $this->assertCount(40,$response->json());
    }
}
