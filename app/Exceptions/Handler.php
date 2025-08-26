<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'password'
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

    public function render($request, Throwable $exception)
    {
        $this->logExceptionInfos($exception);

        if ($exception instanceof TreatedException || $exception->getCode() === 422) {
            return response()->json([
                'message' => $exception->getMessage()
            ], $exception->getCode());
        }

        return response()->json([
            'message' => 'No momento estamos passando por instabilidades, tente novamente mais tarde.',
        ], 500);
    }

    private function logExceptionInfos(Throwable $exception): void
    {
        Log::channel('debug')->info(
            'Request-ID: ' . session('request-id') . "\n" .
                'Exception: ' . get_class($exception) . "\n" .
                'File: ' . $exception->getFile() . "\n" .
                'Line: ' . $exception->getLine() . "\n"
        );

        Log::channel('exceptions')->error(
            'Request-ID: ' . session('request-id') . "\n {$exception->getTraceAsString()} \n"
        );
    }
}
