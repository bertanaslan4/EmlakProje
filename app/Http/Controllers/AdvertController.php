<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Language;
use App\Models\AdvertDesc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdvertController extends Controller
{
    public function index(string $sef)
    {
        $advetDesc = AdvertDesc::where('sef_link', $sef)->firstOrFail();
        $langId = $advetDesc->lang_id;

        $descriptionsConstraint = function ($query) use ($langId) {
            $query->where('lang_id', '=', $langId);
        };

        $advert = $advetDesc->with([
            'advert.facilities.descriptions' => $descriptionsConstraint,
            'advert.features.descriptions' => $descriptionsConstraint,
            'advert.propertyDetails.descriptions' => $descriptionsConstraint,
            'advert.descriptions' => $descriptionsConstraint,
            'advert.type.descriptions' => $descriptionsConstraint,
            'advert.state',
            'advert.city',
            'advert.gallery',
        ])
        ->join('advert', 'advert.id', '=', 'advert_desc.advert_id')
        ->where('advert_desc.sef_link', $sef)
        ->firstOrFail();

        return view('front.advert.detail', compact('advert'));
    }

    public function adverts()
    {
        $language = Language::where('s_code', App::getLocale())->first();

        $adverts = Advert::with([
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
        ])->paginate(12);

        return view('front.advert.list', compact('adverts'));
    }

    public function storeMedia(Request $request)
    {
        $path = storage_path('app/public');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
