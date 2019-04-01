<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Services\LogService;
use App\Services\AuthorService;
use App\Services\GeneralService;

class AuthorController extends Controller
{
    private $general;

    private $authors;

    private $logs;

    public function __construct(GeneralService $general, AuthorService $authors, LogService $logs)
    {
        $this->general = $general;
        $this->authors = $authors;
        $this->logs = $logs;
    }

    public function index()
    {
        $this->general->setTitle('Yazarlar');
        $this->general->getUser();
        $this->authors->getAllAuthors();
        $this->authors->returnAuthorsView();
    }

    public function add()
    {
        $this->general->setTitle('Yazar Ekle');
        $this->general->getUser();
        $this->authors->returnAuthorAddView();
    }

    public function save()
    {
        $input = request()->only('text');
        $user = $this->general->getUser();
        $this->authors->validateAuthorData($input);
        $item = $this->authors->saveAuthorData($input);
        $this->logs->addLogData(Log::AUTHOR_ADD, $user->id, $item->id);
        $this->authors->redirectToAuthorsList();
    }

    public function edit($id)
    {
        $this->general->setTitle('Yazar Düzenle');
        $this->general->getUser();
        $this->authors->getAuthorDetail($id);
        $this->authors->returnAuthorEditView();
    }

    public function update($id)
    {
        $input = request()->only('text');
        $user = $this->general->getUser();
        $this->authors->validateAuthorData($input);
        $item = $this->authors->updateAuthorData($input, $id);
        $this->logs->addLogData(Log::AUTHOR_EDIT, $user->id, $item->id);
        $this->authors->redirectToAuthorsList();
    }

    public function delete($id)
    {
        $user = $this->general->getUser();
        $this->authors->deleteAuthor($id);
        $this->logs->addLogData(Log::AUTHOR_DELETE, $user->id);
        $this->authors->redirectToAuthorsList();
    }
}
