<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic route example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function apply_ledger_route_works()
    {
        $response = $this->get('/ledger/apply');
        $response->assertStatus(200);
        $message = 'Post an action towards product'; //TODO: create localization
        $response->assertSee($message);
    }
}
