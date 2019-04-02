<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticleAuthor;
use App\Models\ArticleTag;
use App\Models\Author;
use App\Models\Language;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleService
{

    public function returnJavascriptArray($items,$primary,$text){
        $return = '{';
        foreach($items as $v){
            $return.='"id":'.$v->{$primary}.',"value":"'.$v->{$text}.'",';
        }
        return $return.'}';
    }

    public function getAllArticles()
    {
        $articles = Article::with(['tags.tag','authors.author'])->get();
        view()->share('articles', $articles);

        return $articles;
    }

    public function getAllLanguages()
    {
        $languages = Language::all();
        view()->share('languages', $languages);

        return $languages;
    }

    public function getTagsAsJsArray()
    {
        $tags = Tag::all();
        $tags = $this->returnJavascriptArray($tags,'id','text');
        view()->share('tags', $tags);

        return $tags;
    }

    public function getAuthorsAsJsArray()
    {
        $authors = Author::all();
        $authors = $this->returnJavascriptArray($authors,'id','name');
        view()->share('authors', $authors);

        return $authors;
    }

    public function validateArticleDataForAdd($input)
    {
        $rules = [
            'title' => 'required',
            'type' => 'required',
            'abstract' => 'required',
            'file' => 'required|file',
            'language_id' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            redirect()->back()->withInput()->withErrors($validator->messages())->throwResponse();
        }
    }

    public function validateArticleDataForEdit($input)
    {
        $rules = [
            'title' => 'required',
            'type' => 'required',
            'abstract' => 'required',
            'language_id' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            redirect()->back()->withInput()->withErrors($validator->messages())->throwResponse();
        }
    }

    public function uploadArticle($file){
        $fileName = Str::random(11).'.'.$file->getClientOriginalExtension();
        $file->move('files/articles/',$fileName);
        return $fileName;
    }

    public function returnIdsAsArray($items,$primary){
        $return = [];
        foreach($items as $v){
            array_push($return,$v->{$primary});
        }
        return $return;
    }

    public function addAllTagsToDB($tags){
        if(is_array($tags)){
            foreach($tags as $v){
                Tag::firstOrCreate(['text' => $v['value']]);
            }
        }
    }

    public function createArrayFromTagInput($items){
        $return = [];
        if(is_array($items)){
            foreach($items as $v){
                array_push($return,$v['value']);
            }
        }
        return $return;
    }

    public function getNewTagsFromDB($tags){
        $tags = $this->createArrayFromTagInput($tags);
        return Tag::whereIn('text',$tags)->get();
    }

    public function checkTagsRelationsFromDB($id,$tags){
        $this->addAllTagsToDB($tags);
        $tags = $this->getNewTagsFromDB($tags);
        $tags = $this->returnIdsAsArray($tags,'id');
        $oldTags = ArticleTag::where('article_id',$id)->get();
        $oldTags = $this->returnIdsAsArray($oldTags,'id');
        $add = array_diff($tags,$oldTags);
        $delete = array_diff($oldTags,$tags);
        foreach($delete as $v){
            ArticleTag::where('article_id',$id)->where('tag_id',$v)->delete();
        }
        foreach($add as $v){
            ArticleTag::create([
                'article_id' => $id,
                'tag_id' => $v,
            ]);
        }
    }

    public function addAllAuthorsToDB($authors){
        if(is_array($authors)){
            foreach($authors as $v){
                Author::firstOrCreate(['name' => $v['value']]);
            }
        }
    }

    public function getNewAuthorsFromDB($authors){
        $authors = $this->createArrayFromTagInput($authors);
        return Author::whereIn('name',$authors)->get();
    }

    public function checkAuthorsRelationsFromDB($id,$authors){
        $this->addAllAuthorsToDB($authors);
        $authors = $this->getNewAuthorsFromDB($authors);
        $authors = $this->returnIdsAsArray($authors,'id');
        $oldAuthors = ArticleAuthor::where('article_id',$id)->get();
        $oldAuthors = $this->returnIdsAsArray($oldAuthors,'id');
        $add = array_diff($authors,$oldAuthors);
        $delete = array_diff($oldAuthors,$authors);
        foreach($delete as $v){
            ArticleAuthor::where('article_id',$id)->where('author_id',$v)->delete();
        }
        foreach($add as $v){
            ArticleAuthor::create([
                'article_id' => $id,
                'author_id' => $v,
            ]);
        }
    }

    public function saveArticleData($input,$userId)
    {
        //File Upload
        $file = $this->uploadArticle($input['file']);
        $item = Article::firstOrCreate([
            'title' => $input['title'],
            'type' => $input['type'],
            'abstract' => $input['abstract'],
            'language_id' => $input['language_id'],
            'file' => $file,
            'added_by' => $userId,
        ]);
        $tags = json_decode($input['tags'],true);
        $this->checkTagsRelationsFromDB($item->id,$tags);
        $authors = json_decode($input['authors'],true);
        $this->checkAuthorsRelationsFromDB($item->id,$authors);
        return $item;
    }

    public function getArticleDetail($id)
    {
        $article = Article::where('id',$id)->with(['authors.author','tags.tag'])->first();
        view()->share('item', $article);

        return $article;
    }

    public function deleteFile($file){
        @unlink(public_path('files/articles/'.$file));
    }

    public function updateArticleData($input, $id)
    {
        $item = Article::find($id);
        $file = $item->file;
        if(isset($input['file'])){
            $this->deleteFile($file);
            $file = $this->uploadArticle($input['file']);
        }
        $item->title = $input['title'];
        $item->type = $input['type'];
        $item->abstract = $input['abstract'];
        $item->language_id = $input['language_id'];
        $item->file = $file;
        $item->save();
        $tags = json_decode($input['tags'],true);
        $this->checkTagsRelationsFromDB($item->id,$tags);
        $authors = json_decode($input['authors'],true);
        $this->checkAuthorsRelationsFromDB($item->id,$authors);
        return $item;
    }

    public function deleteArticle($id)
    {
        $item = Article::find($id);
        $this->deleteFile($item->file);
        ArticleAuthor::where('article_id',$item->id)->delete();
        ArticleTag::where('article_id',$item->id)->delete();
        Article::destroy($id);
    }

    public function redirectToArticlesList()
    {
        redirect(route('articles'))->with(['success' => 1])->throwResponse();
    }

    public function returnArticlesView()
    {
        return response()->view('articles.index')->throwResponse();
    }

    public function returnArticleAddView()
    {
        return response()->view('articles.add')->throwResponse();
    }

    public function returnArticleEditView()
    {
        return response()->view('articles.edit')->throwResponse();
    }
}
