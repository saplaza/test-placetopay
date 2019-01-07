<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPagesInicio()
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
        $response->assertSee('Pse');
    }

    public function testPagesHome()
    {
        $response = $this->get('/home');
        
        $response->assertStatus(200);
        $response->assertSee('Pse');
    }
}
