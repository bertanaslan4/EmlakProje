<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{
    public function index()
    {
        $settingsData = Setting::where('id', 1)->first();
        return view('admin.settings.index', ['settingsData' => $settingsData]);
    }

    public function update(Request $request)
    {
        $settings = Setting::find(1);

        if($settings){
            $file=$request->file('avatar');
            if($file){
                $filename=time() . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->put($filename, File::get($file));
                $settings->logo = $filename;
            }

            $file2=$request->file('avatar2');
            if($file2){
                $filename2=time() . '.' . $file2->getClientOriginalExtension();
                Storage::disk('public')->put($filename2, File::get($file2));
                $settings->favicon = $filename2;
            }

            if($request->input('avatar_remove') == 1) {
                $settings->logo = null;
            }

            if($request->input('avatar_remove2') == 1) {
                $settings->favicon = null;
            }

            $settings->save();

            $activeLanguages = Language::where('is_active', 1)->get();

            foreach ($activeLanguages as $lang) {
                $description = $settings->descriptions()->where('lang_id', $lang->id)->first();

                if($description) {
                    $description->title = $request->input('title_'.$lang->s_code);
                    $description->keywords = $request->input('keywords_'.$lang->s_code);
                    $description->description = $request->input('description_'.$lang->s_code);
                    $description->save();
                }
            }
        }

        Alert::success('Success', 'Settings updated successfully!');

        return redirect()->route('admin.settings');
    }

    public function getSettings()
    {
        $settings = Setting::with(['descriptions'])->where('id', 1)->first();

        return response()->json($settings);
    }
}
