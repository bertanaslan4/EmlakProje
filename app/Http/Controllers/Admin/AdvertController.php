<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\State;
use App\Models\Advert;
use App\Models\Country;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\Currency;
use App\Models\Facility;
use App\Models\Language;
use App\Models\AdvertDesc;
use App\Models\AdvertType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PropertyDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Admin\Advert\StoreRequest;
use App\Models\AdvertApplication;

class AdvertController extends Controller
{

    public function index()
    {
        $adverts = Advert::with([
            'descriptions' => function ($query) {
                $query->where('lang_id', '=', 1);
            },
            'type.descriptions' => function ($query) {
                $query->where('lang_id', '=',1);
            },
            'currency'
        ])->orderByDesc('created_at')->get();
        return view('admin.advert.list',compact('adverts'));
    }

    public function showCreate()
    {
        $features = Feature::with(['descriptions'=>function($q)
        {
            $q->where('lang_id',1);
        }])->get();
        $prop_details = PropertyDetail::with(['descriptions'=>function ($q1) {
            $q1->where('lang_id',1);
        }])->get();

        $facilities=Facility::with(['descriptions'=>function($q){$q->where('lang_id',1);}])->get();
        $types=AdvertType::with(['descriptions'=>function($q){$q->where('lang_id',1);}])->get();

        $currencies = Currency::all();
        $countries = Country::get();

        return view('admin.advert.create',compact('features','prop_details','facilities','types','countries', 'currencies'));
    }
    public function show($id)
    {
        $advert = Advert::with([
            'facilities.descriptions',
            'features.descriptions',
            'propertyDetails.descriptions',
            'descriptions',
            'type.descriptions',
            'city',
            'country',
            'state',
            'gallery',
        ])->findOrFail($id);
        return view('admin.advert.detail', compact('advert'));
    }

    public function store(StoreRequest $request)
    {
        $file=$request->file('avatar');
        if($file){
            $filename=time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename,File::get($file));
        }
        $validated = $request->validated();

        $validated['uuid'] = Str::uuid();
        $validated['thumbnail'] = $filename ?? '';
        $validated['user_id'] = auth()->user()->id;
        $validated['is_active'] = 1;

        $advert = Advert::create($validated);

        $activeLanguages = Language::where('is_active', 1)->get();

        $counter = 1;
        foreach($activeLanguages as $lang){
            if($request->input('title_'.$lang->s_code) == null)
                    continue;

            $baseSlug = Str::slug($request->input('title_'.$lang->s_code), '-');
            $slug = $baseSlug;

            while (AdvertDesc::where('sef_link', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            AdvertDesc::create([
                'advert_id' => $advert->id,
                'lang_id' => $lang->id,
                'title' => $request->input('title_'.$lang->s_code),
                'description' => $request->input('description_'.$lang->s_code) ?? '',
                'sef_link' => $slug,
            ]);
        }

        if(!is_null($request->input('document')))
        {
            foreach ($request->input('document') as $item){
                $gallery=Gallery::create([
                    'advert_id' => $advert->id,
                    'image' =>$item,
                ]);
            }
        }

        $advert->features()->sync($request->input('features'));
        $propertyDetails = $request->input('property_details');
        $advert->propertyDetails()->sync($propertyDetails);
        $facilities = $request->input('facilities');
        $advert->facilities()->sync($facilities);

        Alert::success('Success', 'Advert created successfully!');
        return redirect()->route('admin.advert-list');
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

    public function edit($id)
    {
        $advert = Advert::with([
            'facilities.descriptions',
            'features.descriptions',
            'propertyDetails.descriptions',
            'descriptions',
            'type.descriptions',
            'city',
            'state',
            'country',
            'gallery',
        ])->findOrFail($id);
        $features = Feature::with(['descriptions'=>function($q)
        {
            $q->where('lang_id',1);
        }])->get();
        $prop_details = PropertyDetail::with(['descriptions'=>function ($q1) {
            $q1->where('lang_id',1);
        }])->get();

        $facilities=Facility::with(['descriptions'=>function($q){$q->where('lang_id',1);}])->get();
        $types=AdvertType::with(['descriptions'=>function($q){$q->where('lang_id',1);}])->get();
        $countries = Country::get();
        $states = State::where('country_id', $advert->country_id)->orderBy('name')->get();
        $cities = City::where('state_id', $advert->state_id)->orderBy('name')->get();
        $currencies = Currency::all();

        return view('admin.advert.edit', compact('advert','features','prop_details','facilities','types','countries', 'states', 'cities', 'currencies'));
    }

    public function update(Request $request, $id)
    {
        $file=$request->file('avatar');
        if($file){
            $filename=time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename,File::get($file));
        }

        $advert = Advert::findOrFail($id);
        $advert->update([
            'thumbnail' => $filename ?? $advert->thumbnail,
            'rent_price' => $request->input('rent_price'),
            'deposit_price' => $request->input('deposit_price'),
            'currency_id' => $request->input('currency_id'),
            'category_id' => $request->input('category'),
            'type_id' => $request->input('type'),
            'address' => $request->input('address'),
            'country_id' => $request->input('country_id'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
        ]);

        $activeLanguages = Language::where('is_active', 1)->get();

        $counter = 0;
        foreach ($activeLanguages as $lang) {
            $description = $advert->descriptions()->where('lang_id', $lang->id)->first();

            $baseSlug = Str::slug($request->input('title_'.$lang->s_code), '-');
            $slug = $baseSlug;

            while (AdvertDesc::where('sef_link', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            if (!$description && $request->filled('title_'.$lang->s_code)) {
                $advert->descriptions()->create([
                    'advert_id' => $id,
                    'lang_id' => $lang->id,
                    'title' => $request->input('title_'.$lang->s_code),
                    'description' => $request->input('description_'.$lang->s_code) ?? '',
                    'sef_link' => $slug,
                ]);
            } elseif ($description && $request->filled('title_'.$lang->s_code) && ($description->title !== $request->input('title_'.$lang->s_code) || $description->description !== $request->input('description_'.$lang->s_code))) {
                $description->title = $request->input('title_'.$lang->s_code);
                $description->description = $request->input('description_'.$lang->s_code) ?? '';
                $description->save();
            }
        }

        $advert->features()->sync($request->input('features'));
        $propertyInput = $request->input('property');
        $facilityInput = $request->input('facility');
        if(array_key_exists("0", $facilityInput)) {
            if(!is_null($facilityInput[0]["facility_id"])){
                $advert->facilities()->attach($facilityInput);
            }
        }
        if(array_key_exists("0", $propertyInput)) {
            if(!is_null($propertyInput[0]["property_detail_id"])){
                $advert->propertyDetails()->attach($propertyInput);
            }
        }

        if(!is_null($request->input('document')))
        {
            foreach ($request->input('document') as $item){
                $gallery=Gallery::create([
                    'advert_id' => $advert->id,
                    'image' =>$item,
                ]);
            }
        }

        Alert::success('Success', 'Advert updated successfully!');
        return redirect()->route('admin.advert-list');
    }

    public function destroy($id)
    {
        $advert = Advert::findOrFail($id);
        $advertDescIds = $advert->descriptions->pluck('id')->toArray();
        $advert->descriptions()->delete();
        $advert->features()->detach();
        $advert->facilities()->detach();
        $advert->propertyDetails()->detach();
        $advert->delete();
        Alert::success('Success', 'Advert deleted successfully!');

        return redirect()->route('admin.advert-list');
    }

    public function applicationIndex() {
        $adverts = AdvertApplication::with([
            'advert',
            'user',
            'advert.descriptions',
            'advert.type.descriptions',
            'advert.currency',
        ])->get();

        return view('admin.advert.application-list', compact('adverts'));
    }

    public function applicationUpdate() {
        $application = AdvertApplication::findOrFail(request('advert_application_id'));
        $application->status = request('status');
        $application->rejection_reason = request('rejection_reason');
        $application->save();

        Alert::success('Success', 'Application status updated successfully!');

        return redirect()->route('admin.advert-application-list');
    }

    private function getSyncData($data)
    {
        $syncData = [];
        foreach ($data as $item) {
            $syncData[$item['id']] = ['value' => $item['value']];
        }
        return $syncData;
    }
    private function getSyncDataWithPivot($data)
    {
        $syncData = [];
        foreach ($data as $item) {
            $syncData[$item['id']] = ['value' => $item['value']];
        }
        return $syncData;
    }

    public function facilityDelete(int $id,int $ad_id)
    {
        $advert = Advert::find($ad_id);
        if (!$advert) {
            return response()->json(['message' => 'Advert not found'], 404);
        }
        $advert->facilities()->detach($id);
        Alert::success('Success', 'Facility deleted successfully!');
        return redirect()->back();
    }

    public function propertyDelete(int $id, int $prop_id)
    {
        $advert = Advert::find($prop_id);
        if (!$advert) {
            return response()->json(['message' => 'Advert not found'], 404);
        }
        $advert->propertyDetails()->detach($id);
        Alert::success('Success', 'Property deleted successfully!');
        return redirect()->back();
    }

    public function removeSingleGallery(int $id, int $ad_id)
    {
        $advert = Advert::find($ad_id);
        if (!$advert) {
            return response()->json(['message' => 'Advert not found'], 404);
        }
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }
        $gallery->delete();
        Alert::success('Success', 'Gallery deleted successfully!');
        return redirect()->back();
    }

}
