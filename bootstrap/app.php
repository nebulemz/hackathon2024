<?php

use App\Http\Middleware\IsJunkshopOwner;
use App\Http\Middleware\MustBeJunkshopOwner;
use App\Http\Middleware\MustBeUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'junkshop-owner' => MustBeJunkshopOwner::class,
            'user' => MustBeUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
