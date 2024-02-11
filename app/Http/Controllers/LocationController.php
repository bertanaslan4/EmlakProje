<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;

class LocationController extends Controller
{
    public function getStates(int $id){
        $states = State::where('country_id', $id)->orderBy('name')->get();

        return response()->json($states);
    }

    public function getCitiesWithStateId(int $id){
        $cities = City::where('state_id', $id)->orderBy('name')->get();

        return response()->json($cities);
    }

    public function getCitiesWithCountryId(int $id){
        $cities = City::where('country_id', $id)->orderBy('name')->get();

        return response()->json($cities);
    }
}
