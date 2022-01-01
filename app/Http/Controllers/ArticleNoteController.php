<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Services\GeneralService;

class ArticleNoteController extends Controller
{
    private $general;

    private $articles;

    public function __construct(GeneralService $general, ArticleService $articles)
    {
        $this->general = $general;
        $this->articles = $articles;
    }

    public function index($articleId)
    {
        $this->general->setTitle('Makale Notları');
        $this->general->getUser();

        return view('articles.notes.index', [
            'notes'     => $this->articles->notes($articleId),
            'articleId' => $articleId,
        ]);
    }

    public function add($articleId)
    {
        $this->general->setTitle('Makale Not Ekle');
        $this->general->getUser();

        return view('articles.notes.add', [
            'articleId' => $articleId,
        ]);
    }

    public function save($articleId)
    {
        $input = request()->all();
        $this->articles->validateNoteData($input);
        $this->articles->saveNoteData($input, $articleId);

        return redirect()->route('article.notes', $articleId)->with(['success' => 1]);
    }

    public function edit($articleId, $id)
    {
        $this->general->setTitle('Makale Not Düzenle');
        $this->general->getUser();

        return view('articles.notes.edit', [
            'articleId' => $articleId,
            'item'      => $this->articles->getNoteDetail($id),
        ]);
    }

    public function update($articleId, $id)
    {
        $input = request()->all();
        $this->articles->validateNoteData($input);
        $this->articles->updateNote($input, $id);

        return redirect()->route('article.notes', $articleId)->with(['success' => 1]);
    }

    public function delete($id)
    {
        $articleId = $this->articles->deleteNote($id);

        return redirect()->route('article.notes', $articleId)->with(['success' => 1]);
    }
}
