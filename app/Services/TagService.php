<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\ArticleTag;
use Illuminate\Support\Facades\Validator;

class TagService
{
    public function getAllTags()
    {
        $tags = Tag::all();
        view()->share('tags', $tags);

        return $tags;
    }

    public function validateTagData($input)
    {
        $rules = [
            'text' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            redirect()->back()->withInput()->withErrors($validator->messages())->throwResponse();
        }
    }

    public function validateMergeData($id, $input)
    {
        $rules = [
            'tag_id' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails() || $input['tag_id'] == $id) {
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
        view()->share('item', $tag);

        return $tag;
    }

    public function updateTagData($input, $id)
    {
        $item = Tag::find($id);
        $item->text = $input['text'];
        $item->save();

        return $item;
    }

    public function mergeTags($input, $id)
    {
        $oldTagRelations = ArticleTag::where('tag_id', $input['tag_id'])->get();
        foreach ($oldTagRelations as $v) {
            $v->tag_id = $id;
            $v->save();
        }
        Tag::destroy($input['tag_id']);
    }

    public function deleteTag($id)
    {
        Tag::destroy($id);
    }

    public function redirectToTagsList()
    {
        redirect(route('tags'))->with(['success' => 1])->throwResponse();
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

    public function returnTagMergeView()
    {
        return response()->view('tags.merge')->throwResponse();
    }
}
