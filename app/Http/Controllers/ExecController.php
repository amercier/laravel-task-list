<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Artisan;

/**
 * Controller for executing commands
 */
class ExecController extends Controller
{
    protected function buildResponse($output, $exitCode)
    {
        $response = new Response($output, $exitCode ? 500 : 200);
        $response->headers->set('Content-Type', 'text/plain');
        return $response;
    }

    protected function artisan($command)
    {
        $exitCode = Artisan::call($command);
        return $this->buildResponse(Artisan::output(), $exitCode);
    }
}
