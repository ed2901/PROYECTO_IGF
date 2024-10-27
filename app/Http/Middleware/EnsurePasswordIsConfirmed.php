<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsurePasswordIsConfirmed
{
    public function handle($request, Closure $next)
    {
        if (!Auth::user() || !Auth::user()->hasConfirmedPassword()) {
            return redirect('password/confirm'); // O el URL que desees
        }

        return $next($request);
    }
}
