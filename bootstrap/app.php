<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api_v1.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',

        // Change default prefix for better versioning
        apiPrefix: "api/v1",
        // then: function () {
        //     Route::middleware('api')
        //         ->prefix('api/v2')
        //         ->group(__DIR__ . '/../routes/api_v2.php');
        // }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
