<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Facades\Validator;

class TagService
{
    public function getAllTags()
    {
        $tags = Tag::all();
        view()->share('tags',$tags);
        return $tags;
    }

    public function validateTagData($input)
    {
        $rules    = [
            'text' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            redirect()->back()->withInput()->withErrors($validator->messages())->throwResponse();
        }
    }

    public function saveTagData($input)
    {
        $item = Tag::firstOrCreate(['text' => $input['text']]);
        return $item;
    }

    public function getTagDetail($id)
    {
        $tag = Tag::find($id);
        view()->share('item',$tag);
        return $tag;
    }

    public function updateTagData($input,$id)
    {
        $item = Tag::find($id);
        $item->text = $input['text'];
        $item->save();
        return $item;
    }

    public function deleteTag($id)
    {
        Tag::destroy($id);
    }

    public function redirectToTagsList()
    {
        redirect(route('tags'))->with(array('success' => 1))->throwResponse();
    }

    public function returnTagsView()
    {
        return response()->view('tags.index')->throwResponse();
    }

    public function returnTagAddView()
    {
        return response()->view('tags.add')->throwResponse();
    }

    public function returnTagEditView()
    {
        return response()->view('tags.edit')->throwResponse();
    }
}
