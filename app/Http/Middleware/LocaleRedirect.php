<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocaleRedirect
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1); // Obtenir la première partie de l'URL

        if (in_array($locale, ['fr', 'en'])) {
            return redirect($locale . '/');
        }

        return $next($request);
    }
}

