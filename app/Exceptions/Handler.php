<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

     // app/Exceptions/Handler.php


         protected function unauthenticated($request, AuthenticationException $exception)
         {
             if ($request->expectsJson()) {
                 return response()->json(['error' => 'Unauthenticated.'], 401);
             }
             if ($request->is('company') || $request->is('company/*')) {
                 return redirect()->guest('/company/login');
             }
             if ($request->is('admin') || $request->is('admin/*')) {
                 return redirect()->guest('/admin/login');
             }
             return redirect()->guest(route('login'));
         }
}


