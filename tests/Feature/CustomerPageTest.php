<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanCreaatCustomer()
    {
        $response = $this->get('/customer');

        $response->assertStatus(200);
        $response->assertSee("Custormer Create workes is ist=ttttW");
    }
}
