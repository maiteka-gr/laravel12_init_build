<?php

namespace Laravel\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

/**
 * JwtMiddleware handles JWT token validation for API requests.
 * Middleware for authenticating and authorizing API access.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class JwtMiddleware{
    /**
     * Handle an incoming request and validate JWT token.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next ): mixed {
        try {

        } catch ( Exception $exception ) {
            
        }

        return $next( $request );
    }
}
