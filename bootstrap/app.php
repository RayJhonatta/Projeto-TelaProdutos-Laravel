<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        // 1. Garante que as rotas da API não exijam o token CSRF do ambiente Web
        $middleware->validateCsrfTokens(except: [
            'api/*',
        ]);

        // 2. Adiciona os cabeçalhos de CORS para permitir que a Vercel acesse o Railway
        $middleware->append(\Illuminate\Http\Middleware\HandleCors::class);
        
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();