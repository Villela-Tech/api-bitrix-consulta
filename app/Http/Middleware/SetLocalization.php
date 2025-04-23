<?php

namespace App\Http\Middleware;

use Closure;

class SetLocalization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (app('auth')->user()) {

            $locale = app('auth')->user()->lang;

            switch ($locale) {
                case 'br':
                    $locale = 'pt_br';
                    break;
                default:
                    $locale = 'en';
                    break;
            }

            app('translator')->setlocale($locale);
        }

        return $next($request);
    }
}
