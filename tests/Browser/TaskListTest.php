<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Task;

class TaskListTest extends DuskTestCase
{
    /**
     * @return void
     */
    public function testTaskList()
    {
        $this->browse(
            function (Browser $browser) {
                $browser->visit('/')
                    ->assertSee('E-Mail Address')
                    ->assertSee('Password')
                    ->assertSee('Remember Me')
                    ->assertSee('Login')

                    // Register new user
                    ->clickLink('Register')
                    ->assertSee('Name')
                    ->assertSee('E-Mail Address')
                    ->assertSee('Password')
                    ->assertSee('Confirm Password')
                    ->assertSee('Register')
                    ->type('name', 'John Smith')
                    ->type('email', 'jsmith@example.com')
                    ->type('password', 'jsmithlol')
                    ->type('password_confirmation', 'jsmithlol')
                    ->press('Register')

                    // Empty task list
                    ->assertSee('Task List')
                    ->assertSee('New Task')
                    ->assertSee('Add Task')
                    ->assertDontSee('Current Tasks')
                    ->assertDontSee('Test task 1')
                    ->assertDontSee('Test task 2')

                    // Add a task
                    ->type('name', 'Test task 1')
                    ->press('Add Task')
                    ->assertPathIs('/')
                    ->assertSee('Current Tasks')
                    ->assertSee('Test task 1')
                    ->assertDontSee('Test task 2')

                    // Add another task
                    ->type('name', 'Test task 2')
                    ->press('Add Task')
                    ->assertPathIs('/')
                    ->assertSee('Current Tasks')
                    ->assertSee('Test task 1')
                    ->assertSee('Test task 2')

                    // Delete all tasks
                    ->press('Delete')
                    ->assertPathIs('/')
                    ->press('Delete')
                    ->assertPathIs('/')
                    ->assertDontSee('Test task 1')
                    ->assertDontSee('Test task 2');
            }
        );
    }
}
