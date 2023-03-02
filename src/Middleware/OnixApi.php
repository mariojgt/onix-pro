<?php

namespace Mariojgt\Onix\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Skeleton admin guest middleware, will manage the backend and make sure the user is not login.
 */
class OnixApi
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get the bearer token
        $token = $request->bearerToken();

        // Check if the token match the one in the config
        if ($token != config('onix.request_token')) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
        return $next($request);
    }
}
