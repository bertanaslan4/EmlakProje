<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\Language;
use App\Models\FeatureDesc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class FeatureController extends Controller
{
    public function index()
    {
        $features=Feature::with(['descriptions'])->get();
        return view('admin.feature.list', compact('features'));
    }
    public function store(Request $request)
    {
        $feature = Feature::create(['is_active'=>1,]);

        $activeLanguages = Language::where('is_active', 1)->get();
        foreach ($activeLanguages as $lang) {
            if($request->input('feature_'.$lang->s_code) == null)
                    continue;
            FeatureDesc::create([
                'feature_id' => $feature->id,
                'lang_id' => $lang->id,
                'name' => $request->input('feature_'.$lang->s_code),
            ]);
        }

        $feature->save();
        Alert::success('Success', 'Feature added successfully!');
        return redirect()->route('admin.feature-list');

    }

    public function edit(Request $request){
        $feature=Feature::findOrFail($request->input('feature_id'));
        if ($feature) {
            $activeLanguages = Language::where('is_active', 1)->get();

            foreach ($activeLanguages as $lang) {
                $description = $feature->descriptions()->where('lang_id', $lang->id)->first();

                if (!$description && $request->filled('feature_'.$lang->s_code)) {
                    $feature->descriptions()->create([
                        'lang_id' => $lang->id,
                        'name' => $request->input('feature_'.$lang->s_code),
                    ]);
                } elseif ($description && $request->filled('feature_'.$lang->s_code) && $description->name !== $request->input('feature_'.$lang->s_code)) {
                    $description->name = $request->input('feature_'.$lang->s_code);
                    $description->save();
                }
            }
        }
        Alert::success('Success', 'Feature updated successfully!');

        return redirect()->route('admin.feature-list');
    }

    public function destroy($id)
    {
        $feature=Feature::findOrFail($id);
        $feature->descriptions()->delete();
        $feature->adverts()->detach();
        $feature->delete();
        Alert::success('Success', 'Feature deleted successfully!');

        return redirect()->route('admin.feature-list');
    }

    public function getFeatures(int $id)
    {
        $feature = Feature::with(['descriptions'])->findOrFail($id);
        return response()->json($feature);
    }
}
