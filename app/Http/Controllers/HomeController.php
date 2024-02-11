<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Language;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    private function getAdvertsByCategory($categoryId, $limit = 6) {
        $language = Language::where('s_code', App::getLocale())->first();

        $advert = Advert::with([
            'descriptions' => function ($query) use ($language) {
                $query->where('lang_id', '=', $language->id);
            },
            'propertyDetails.descriptions'=> function ($query) use ($language) {
                $query->where('lang_id', '=', $language->id);
            },
            'gallery',
            'state',
            'city',
            'currency',
        ])->where('category_id', $categoryId)->latest()->take($limit)->get();

        return $advert;
    }

    public function index(){
        $homes = $this->getAdvertsByCategory(1);
        $offices = $this->getAdvertsByCategory(2);

        return view('front.home.home',compact('homes','offices'));
    }

    public function detail(){
        return view('front.advert.detail');
    }
}
