<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\PropertyDetail;
use App\Models\PropertyDetailDesc;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyDetailController extends Controller
{
    public function index()
    {
        $icons = ['bath.svg','bed.svg','size.svg','build-year.svg','garage.svg','dimension.svg','villa.svg'];

        $property=PropertyDetail::with(['descriptions'])->get();

        return view('admin.property_detail.list', compact('property','icons'));
    }

    public function store(Request $request){
        $activeLanguages = Language::where('is_active', 1)->get();
        $activeLanguage = Language::where('is_active', 1)->first();

        $property=PropertyDetail::create(['icon'=>$request->input('property_icon_'.$activeLanguage->s_code)]);

        foreach ($activeLanguages as $lang) {
            if($request->input('property_name_'.$lang->s_code) == null)
                    continue;
            PropertyDetailDesc::create([
                'property_detail_id' => $property->id,
                'lang_id' => $lang->id,
                'name' => $request->input('property_name_'.$lang->s_code),
            ]);
        }

        $property->save();
        Alert::success('Success', 'Property detail added successfully!');
        return redirect()->route('admin.property-list');
    }

    public function edit(Request $request){
        $activeLanguage = Language::where('is_active', 1)->first();

        $property=PropertyDetail::findOrFail($request->input('property_id'));
        $property->icon=$request->input('property_icon_'.$activeLanguage->s_code);

        if ($property) {
            $activeLanguages = Language::where('is_active', 1)->get();

            foreach ($activeLanguages as $lang) {
                $description = $property->descriptions()->where('lang_id', $lang->id)->first();

                if (!$description && $request->filled('property_name_'.$lang->s_code)) {
                    $property->descriptions()->create([
                        'lang_id' => $lang->id,
                        'name' => $request->input('property_name_'.$lang->s_code),
                    ]);
                } elseif ($description && $request->filled('property_name_'.$lang->s_code) && $description->name !== $request->input('property_name_'.$lang->s_code)) {
                    $description->name = $request->input('property_name_'.$lang->s_code);
                    $description->save();
                }
            }
        }
        $property->save();
        Alert::success('Success', 'Property detail updated successfully!');

        return redirect()->route('admin.property-list');
    }

    public function destroy($id){
        $property=PropertyDetail::findOrFail($id);
        $property->descriptions()->delete();
        $property->adverts()->detach();
        $property->delete();
        Alert::success('Success', 'Property detail deleted successfully!');

        return redirect()->route('admin.property-list');
    }

    public function getProperties(int $id){
        $property = PropertyDetail::with(['descriptions'])->findOrFail($id);

        return response()->json($property);
    }
}
