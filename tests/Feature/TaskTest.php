<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * Retrieve task list
     *
     * @return void
     */
    public function testHomeRedirectsToLogin()
    {
        $response = $this->get('/');
        $response->assertRedirect('/login');
    }

    /**
     * Retrieve task list
     *
     * @return void
     */
    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
}
