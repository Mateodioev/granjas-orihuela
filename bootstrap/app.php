<?php

use App\Exceptions\ApiException;
use App\Http\Middleware\LoadEmployee;
use App\Http\Middleware\OnlyEmployees;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('auth', LoadEmployee::class);
        $middleware->alias([
            'onlyEmployees' => OnlyEmployees::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->report(function (Throwable $e) {
            Log::error($e::class . ': ' . $e->getMessage(), ['exception' => $e]);
        });

        $exceptions->render(function (ApiException $apiException, Request $request) {
            if (!$request->is('api/*')) {
                return response()->view('errors.404', status: 404);
            }

            $error = $apiException->getAsArray();
            return response()->json($error, $apiException->getCode());
        });
    })->create();
