<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * Retrieve task list
     * @return void
     */
    public function testGet()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
