<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use App\Models\Language;
use App\Models\FacilityDesc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities=Facility::with(['descriptions'])->get();
        return view('admin.facility.list',compact('facilities'));
    }

    public function store(Request $request){
        $facility = Facility::create(['is_active'=>1,]);

        $activeLanguages = Language::where('is_active', 1)->get();
        foreach ($activeLanguages as $lang) {
            if($request->input('facility_'.$lang->s_code) == null)
                    continue;
            FacilityDesc::create([
                'facility_id' => $facility->id,
                'lang_id' => $lang->id,
                'name' => $request->input('facility_'.$lang->s_code),
            ]);
        }
        $facility->save();
        Alert::success('Success', 'Facility added successfully!');
        return redirect()->route('admin.facility-list');
    }

    public function edit(Request $request){
        $facility=Facility::findOrFail($request->input('facility_id'));

        if ($facility) {
            $activeLanguages = Language::where('is_active', 1)->get();

            foreach ($activeLanguages as $lang) {
                $description = $facility->descriptions()->where('lang_id', $lang->id)->first();

                if (!$description && $request->filled('facility_'.$lang->s_code)) {
                    $facility->descriptions()->create([
                        'lang_id' => $lang->id,
                        'name' => $request->input('facility_'.$lang->s_code),
                    ]);
                } elseif ($description && $request->filled('facility_'.$lang->s_code) && $description->name !== $request->input('facility_'.$lang->s_code)) {
                    $description->name = $request->input('facility_'.$lang->s_code);
                    $description->save();
                }
            }
        }

        Alert::success('Success', 'Facility updated successfully!');

        return redirect()->route('admin.facility-list');
    }

    public function destroy(int $id)
    {
        $facility=Facility::findOrFail($id);
        $facility->descriptions()->delete();
        $facility->adverts()->detach();
        $facility->delete();
        Alert::success('Success', 'Facility deleted successfully!');

        return redirect()->route('admin.facility-list');
    }

    public function getFacilities(int $id)
    {
        $facility = Facility::with(['descriptions'])->findOrFail($id);
        return response()->json($facility);
    }
}
