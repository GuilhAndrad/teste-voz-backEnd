<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Tratamento para validação
        $exceptions->render(function (ValidationException $exception) {
            return response()->json([
                'message' => 'Erro de validação.',
                'errors' => $exception->errors(),
            ], 422);
        });

        // 404 - Not Found
        $exceptions->render(function (NotFoundHttpException $exception) {
            return response()->json([
                'message' => 'Recurso não encontrado.',
            ], 404);
        });

        // 405 - Method Not Allowed
        $exceptions->render(function (MethodNotAllowedHttpException $exception) {
            return response()->json([
                'message' => 'Método HTTP não permitido para esta rota.',
            ], 405);
        });

        // Tratamento genérico para outros erros
        $exceptions->render(function (\Throwable $exception) {
            return response()->json([
                'message' => 'Ocorreu um erro inesperado. Por favor, tente novamente mais tarde.',
            ], 500);
        });
    })->create();