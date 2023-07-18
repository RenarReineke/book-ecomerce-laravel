<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;

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

    protected $dontReport = [BusinessException::class];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exeption)
    {
        if ($exeption instanceof BusinessException) {
            if ($request->wantsJson()) {
                $message = [
                    'success' => false,
                    'error' => $exeption->getUserMessage()
                ];

                return response($message, Response::HTTP_BAD_REQUEST);
            } else {
                return redirect()->back()->withInput()->withErrors([
                    'error' => $exeption->getUserMessage()
                ]);
            }
        }

        if ($exeption instanceof ModelNotFoundException) {
            if ($request->wantsJson()) {
                $message = [
                    'success' => false,
                    'error' => $exeption->getMessage()
                ];

                return response($message, Response::HTTP_NO_CONTENT);
            } else {
                return redirect()->back()->withInput()->withErrors([
                    'error' => $exeption->getMessage()
                ]);
            }
        }
    }
}
