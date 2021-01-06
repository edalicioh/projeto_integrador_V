<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class ApiProtecteRoute extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json(['status' => 401, 'messagen' => 'Token is Invalid']);
            } else if ($e instanceof TokenExpiredException) {
                return response()->json(['status' => 401, 'messagen' => 'Token is Expired']);
            } else {
                return response()->json(['status' => 401, 'messagen' => 'Authorization Token not found']);
            }
        }


        $request['user'] = [
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email,
        ];
        return $next($request);
    }
}
