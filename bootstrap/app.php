<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Middleware\Authenticatable;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        // Registrasi middleware global bisa ditambahkan di sini

    $middleware->alias([
        // 'auth' => \App\Http\Middleware\Authenticatable::class,
        // 'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        // 'user' => \App\Http\Middleware\UserMiddleware::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
