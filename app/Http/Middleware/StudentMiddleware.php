<?php

namespace App\Http\Middleware;

use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        
        $student = $token ? Student::where('accessToken', $token)->first() : null;

        if ($student) {

            $request->attributes->add(['student' => $student]);
            return $next($request);

        }

        return response([
            'message' => 'unauthorized'
        ]);
    }
}
