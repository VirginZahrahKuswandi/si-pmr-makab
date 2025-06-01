<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FasilitatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Only allow users with a non-null fasilitator_id.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || is_null($user->fasilitator_id)) {
            return redirect('/');
        }

        return $next($request);
    }
}
