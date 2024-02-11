<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetAppLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $languages = Language::pluck('s_code')->flip()->all();

        $appLocale = $request->cookie('applocale');

        if ($appLocale && array_key_exists($appLocale, $languages)) {
            App::setLocale($appLocale);
        } else {
            App::setLocale(config('app.fallback_locale'));
        }

        return $next($request);
    }
}