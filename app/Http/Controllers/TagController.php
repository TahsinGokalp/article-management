<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Services\LogService;
use App\Services\TagService;
use App\Services\GeneralService;

class TagController extends Controller
{
    private $general;

    private $tags;

    private $logs;

    public function __construct(GeneralService $general, TagService $tags, LogService $logs)
    {
        $this->general = $general;
        $this->tags = $tags;
        $this->logs = $logs;
    }

    public function index()
    {
        $this->general->setTitle('Etiketler');
        $this->general->getUser();
        $this->tags->getAllTags();
        $this->tags->returnTagsView();
    }

    public function add()
    {
        $this->general->setTitle('Etiket Ekle');
        $this->general->getUser();
        $this->tags->returnTagAddView();
    }

    public function save()
    {
        $input = request()->only('text');
        $user = $this->general->getUser();
        $this->tags->validateTagData($input);
        $item = $this->tags->saveTagData($input);
        $this->logs->addLogData(Log::TAG_ADD, $user->id, $item->id);
        $this->tags->redirectToTagsList();
    }

    public function edit($id)
    {
        $this->general->setTitle('Etiket Düzenle');
        $this->general->getUser();
        $this->tags->getTagDetail($id);
        $this->tags->returnTagEditView();
    }

    public function update($id)
    {
        $input = request()->only('text');
        $user = $this->general->getUser();
        $this->tags->validateTagData($input);
        $item = $this->tags->updateTagData($input, $id);
        $this->logs->addLogData(Log::TAG_EDIT, $user->id, $item->id);
        $this->tags->redirectToTagsList();
    }

    public function delete($id)
    {
        $user = $this->general->getUser();
        $this->tags->deleteTag($id);
        $this->logs->addLogData(Log::TAG_DELETE, $user->id);
        $this->tags->redirectToTagsList();
    }
}
