<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\AdvertType;
use Illuminate\Http\Request;
use App\Models\AdvertTypeDesc;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdvertTypeController extends Controller
{
    public function index() {
        $advertTypes = AdvertType::with(['descriptions'])->get();

        return view('admin.advert-type.list', compact('advertTypes'));
    }

    public function store(Request $request) {
        $adverttype = AdvertType::create([]);

        $activeLanguages = Language::where('is_active', 1)->get();
        foreach ($activeLanguages as $lang) {
            if($request->input('adverttype_'.$lang->s_code) == null)
                    continue;
            AdvertTypeDesc::create([
                'advert_type_id' => $adverttype->id,
                'lang_id' => $lang->id,
                'title' => $request->input('adverttype_'.$lang->s_code),
                'description' => $request->input('adverttypedesc_'.$lang->s_code),
            ]);
        }
        $adverttype->save();

        Alert::success('Success', 'Advert type added successfully!');
        return redirect()->route('admin.advert-type-list');
    }

    public function edit(Request $request){
        $advert_type=AdvertType::findOrFail($request->input('advert_type_id'));

        if ($advert_type) {
            $activeLanguages = Language::where('is_active', 1)->get();

            foreach ($activeLanguages as $lang) {
                $description = $advert_type->descriptions()->where('lang_id', $lang->id)->first();

                if (!$description && $request->filled('adverttype_'.$lang->s_code)) {
                    $advert_type->descriptions()->create([
                        'lang_id' => $lang->id,
                        'title' => $request->input('adverttype_'.$lang->s_code),
                        'description' => $request->input('adverttypedesc_'.$lang->s_code),
                    ]);
                } elseif ($description && $request->filled('adverttype_'.$lang->s_code) && $description->title !== $request->input('adverttype_'.$lang->s_code)) {
                    $description->title = $request->input('adverttype_'.$lang->s_code);
                    $description->description = $request->input('adverttypedesc_'.$lang->s_code);
                    $description->save();
                }
            }
        }

        Alert::success('Success', 'Advert Type updated successfully!');

        return redirect()->route('admin.advert-type-list');
    }

    public function destroy(int $id)
    {
        $advertType=AdvertType::findOrFail($id);
        $advertType->descriptions()->delete();
        $advertType->adverts()->detach();
        $advertType->delete();
        Alert::success('Success', 'Advert Type deleted successfully!');

        return redirect()->route('admin.advert-type-list');
    }

    public function getAdvertTypes($id) {
        $advertType = AdvertType::with(['descriptions'])->findOrFail($id);
        return response()->json($advertType);
    }
}
