<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Exec Routes
|--------------------------------------------------------------------------
|
| Routes for remote execution. This allow running migration commands on host
| in scenarios where SSH is not available.
*/

Route::post('/artisan/{command}', 'ExecController@artisan');
