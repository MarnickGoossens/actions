<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->admin) {
            return $next($request);
        }
        return abort(403, 'Alleen administratoren kunnen deze pagina bekijken.');
    }
}
