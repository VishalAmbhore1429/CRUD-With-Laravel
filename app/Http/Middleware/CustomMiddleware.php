<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Add your custom logic here

        // Optionally, check something or modify the request

        $validate = $request->input('token'); 

        if (!$validate) {
            return response()->json(['error' => 'Please provide token'], 401);
        }
        
        return $next($request);

        if (some_condition()) {
            return redirect('somewhere');
        }

        return $next($request);
    }
}
