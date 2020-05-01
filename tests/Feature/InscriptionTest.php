<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InscriptionTest extends TestCase
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
    /*public function testGetAllInscriptions()
    {
        $response = $this->json('GET','/api/all/inscriptions');
        
        $response->assertStatus(200);
        $this->assertCount(40,$response->json());
    }*/
}
