<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

class JwtWebMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $token = null;
            $header = $request->header('Authorization');
            if ($header && preg_match('/Bearer\s+(.*)$/i', $header, $m)) {
                $token = $m[1];
            }
            if (! $token && $request->cookie('jwt_token')) {
                $token = $request->cookie('jwt_token');
            }
            if (! $token) {
                return redirect()->route('login');
            }

            JWTAuth::setToken($token);
            $user = JWTAuth::parseToken()->authenticate();
            if (! $user) {
                return redirect()->route('login');
            }
            $request->attributes->set('jwt_user', $user);
            return $next($request);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return redirect()->route('login')->with('error','Session expired');
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
