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

        if ($exception instanceof TreatedException) {
            return response()->json([
                'message' => $exception->getMessage()
            ], $exception->getCode());
        }

        return parent::render($request, $exception);
    }

    private function logExceptionInfos(Throwable $exception): void
    {
        Log::channel('exceptions')->info(
            'File: ' . $exception->getFile() . "\n" .
                'Line: ' . $exception->getLine() . "\n"
        );

        Log::channel('exceptions')->error(
            $exception->getMessage() . "\n",
            array_slice($exception->getTrace(), 0, 2)
        );
        Log::channel('exceptions')->notice("\n");
    }
}
