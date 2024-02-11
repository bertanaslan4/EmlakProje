<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;

class SetLanguageController extends Controller
{
    public function __invoke($lang): RedirectResponse
    {
        $fallbackLocale = config('app.fallback_locale');

        $applocale = Cookie::get('applocale', $fallbackLocale);

        $languages = Language::pluck('s_code')->flip()->all();

        if (array_key_exists($lang, $languages)) {
            $applocale = $lang;
        }

        return redirect()
            ->back()
            ->withCookie(cookie()->forever('applocale', $applocale));
    }
}