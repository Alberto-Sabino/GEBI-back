<?php

namespace App\Http\Middleware;

use App\Exceptions\TreatedException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class SavePersonalTokenInSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $personalToken = $request->header('Authorization', false);
        $personalToken = substr($personalToken, 7); // Remove Bearer

        if (!$personalToken || !Cache::has($personalToken)) {
            Cache::forget($personalToken);
            throw new TreatedException('Acesso não autorizado.', 401);
        }

        session(['personal-token' => $personalToken]);

        return $next($request);
    }
}
