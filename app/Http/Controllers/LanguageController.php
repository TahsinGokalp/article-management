<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Services\LogService;
use App\Services\GeneralService;
use App\Services\LanguageService;

class LanguageController extends Controller
{
    private $general;

    private $languages;

    private $logs;

    public function __construct(GeneralService $general, LanguageService $languages, LogService $logs)
    {
        $this->general = $general;
        $this->languages = $languages;
        $this->logs = $logs;
    }

    public function index()
    {
        $this->general->setTitle('Diller');
        $this->general->getUser();
        $this->languages->getAllLanguages();
        $this->languages->returnLanguagesView();
    }

    public function add()
    {
        $this->general->setTitle('Dil Ekle');
        $this->general->getUser();
        $this->languages->returnLanguageAddView();
    }

    public function save()
    {
        $input = request()->only('text');
        $user = $this->general->getUser();
        $this->languages->validateLanguageData($input);
        $item = $this->languages->saveLanguageData($input);
        $this->logs->addLogData(Log::LANGUAGE_ADD, $user->id, $item->id);
        $this->languages->redirectToLanguagesList();
    }

    public function edit($id)
    {
        $this->general->setTitle('Dil Düzenle');
        $this->general->getUser();
        $this->languages->getLanguageDetail($id);
        $this->languages->returnLanguageEditView();
    }

    public function update($id)
    {
        $input = request()->only('text');
        $user = $this->general->getUser();
        $this->languages->validateLanguageData($input);
        $item = $this->languages->updateLanguageData($input, $id);
        $this->logs->addLogData(Log::LANGUAGE_EDIT, $user->id, $item->id);
        $this->languages->redirectToLanguagesList();
    }

    public function delete($id)
    {
        $user = $this->general->getUser();
        $this->languages->deleteLanguage($id);
        $this->logs->addLogData(Log::LANGUAGE_DELETE, $user->id);
        $this->languages->redirectToLanguagesList();
    }
}
