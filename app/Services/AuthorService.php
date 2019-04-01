<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Support\Facades\Validator;

class AuthorService
{
    public function getAllAuthors()
    {
        $authors = Author::all();
        view()->share('authors', $authors);

        return $authors;
    }

    public function validateAuthorData($input)
    {
        $rules = [
            'text' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            redirect()->back()->withInput()->withErrors($validator->messages())->throwResponse();
        }
    }

    public function saveAuthorData($input)
    {
        $item = Author::firstOrCreate(['name' => $input['text']]);

        return $item;
    }

    public function getAuthorDetail($id)
    {
        $author = Author::find($id);
        view()->share('item', $author);

        return $author;
    }

    public function updateAuthorData($input, $id)
    {
        $item = Author::find($id);
        $item->name = $input['text'];
        $item->save();

        return $item;
    }

    public function deleteAuthor($id)
    {
        Author::destroy($id);
    }

    public function redirectToAuthorsList()
    {
        redirect(route('authors'))->with(['success' => 1])->throwResponse();
    }

    public function returnAuthorsView()
    {
        return response()->view('authors.index')->throwResponse();
    }

    public function returnAuthorAddView()
    {
        return response()->view('authors.add')->throwResponse();
    }

    public function returnAuthorEditView()
    {
        return response()->view('authors.edit')->throwResponse();
    }
}
