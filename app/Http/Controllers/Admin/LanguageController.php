<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LanguageController extends Controller
{
    public function index() {
        $languagesModel = Language::all();
        return view('admin.language.index', compact('languagesModel'));
    }

    public function store(Request $request) {
        $language = new Language();
        $language->name = $request->input('name');
        $language->s_code = $request->input('s_code');
        $language->l_code = $request->input('l_code');
        $language->save();

        Alert::success('Success', 'Language added successfully!');

        return redirect()->route('admin.language-list');
    }

    public function update(Request $request) {
        $language = Language::findOrFail($request->input('language_id'));

        $is_active = $request->input('is_active') == 'on' ? 1 : 0;
        $is_default = $request->input('is_default') == 'on' ? 1 : 0;

        $language->name = $request->input('name');
        $language->s_code = $request->input('s_code');
        $language->is_active = $is_active;

        $defaultLanguagesCount = Language::where('is_default', '=', 1)->where('id', '!=', $language->id)->count();
        if ($defaultLanguagesCount === 0) {
            return redirect()->back()->withErrors(['error' => 'At least one language must be default.'])->withInput();
        }

        if ($is_default == 1) {
            $language->is_default = 1;
            Language::where('id', '!=', $language->id)->update(['is_default' => 0]);
        } else {
            $language->is_default = $is_default;
        }

        $language->save();

        Alert::success('Success', 'Language updated successfully!');

        return redirect()->route('admin.language-list');
    }

    public function translationList()
    {
        $translations = DB::table('fragments')->get();
        $defaultLanguage = Language::where('is_default', '=', 1)->first();

        return view('admin.language.translation-list', compact('translations', 'defaultLanguage'));
    }

    public function translationStore(Request $request)
    {
        $transKey = $request->input('trans_key');

        $languages = $request->except(['_token', 'trans_key']);

        $jsonText = json_encode($languages);

        DB::table('fragments')->insert(
            ['key' => $transKey, 'text' => $jsonText, 'created_at' => now(), 'updated_at' => now()]
        );

        Alert::success('Success', 'Translation updated successfully!');

        return redirect()->route('admin.translation-list');
    }

    public function translationEdit(Request $request)
    {
        $translation = DB::table('fragments')->where('id', $request->input('translation_id'))->first();
        $text = $request->except(['_token', 'translation_id', 'trans_key']);

        $jsonText = json_encode($text);
        if ($translation) {
            DB::table('fragments')
            ->where('id', $request->input('translation_id'))
            ->update(
                ["key"=> $request->input('trans_key'), "text" => $jsonText]
            );
        }

        Alert::success('Success', 'Translation updated successfully!');

        return redirect()->route('admin.translation-list');
    }

    public function getTranslation(int $id){
        $translation = DB::table('fragments')->where('id', $id)->first();
        return response()->json($translation);
    }

    public function getLanguage(int $id){
        $language = Language::find($id);
        return response()->json($language);
    }
}
