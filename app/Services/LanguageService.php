<?php

namespace App\Services;

use App\Models\Language;
use Illuminate\Support\Facades\Validator;

class LanguageService
{
    public function getAllLanguages()
    {
        $languages = Language::all();
        view()->share('languages', $languages);

        return $languages;
    }

    public function validateLanguageData($input)
    {
        $rules = [
            'text' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            redirect()->back()->withInput()->withErrors($validator->messages())->throwResponse();
        }
    }

    public function saveLanguageData($input)
    {
        $item = Language::firstOrCreate(['text' => $input['text']]);

        return $item;
    }

    public function getLanguageDetail($id)
    {
        $tag = Language::find($id);
        view()->share('item', $tag);

        return $tag;
    }

    public function updateLanguageData($input, $id)
    {
        $item = Language::find($id);
        $item->text = $input['text'];
        $item->save();

        return $item;
    }

    public function deleteLanguage($id)
    {
        Language::destroy($id);
    }

    public function redirectToLanguagesList()
    {
        redirect(route('languages'))->with(['success' => 1])->throwResponse();
    }

    public function returnLanguagesView()
    {
        return response()->view('languages.index')->throwResponse();
    }

    public function returnLanguageAddView()
    {
        return response()->view('languages.add')->throwResponse();
    }

    public function returnLanguageEditView()
    {
        return response()->view('languages.edit')->throwResponse();
    }
}
