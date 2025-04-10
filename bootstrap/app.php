<?php

use App\Mail\SendMailError;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo('/admin/entrar');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->reportable(function (Throwable $e) {

            if (App::environment() == 'production') {

                try {
                    $content['message'] = $e->getMessage();
                    $content['file'] = $e->getFile();
                    $content['line'] = $e->getLine();
                    $content['url'] = request()->url();

                    Mail::to('programacao2@lovatel.com.br')->send(new SendMailError($content));
                } catch (Throwable $e) {

                    Log::error($e);
                }
            }
        });
    })->create();
