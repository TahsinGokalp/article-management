<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Services\ArticleService;
use App\Services\GeneralService;
use App\Services\LogService;
use Illuminate\Support\Facades\Request;

class ArticleController extends Controller
{
    private $general;

    private $articles;

    private $logs;

    public function __construct(GeneralService $general, ArticleService $articles, LogService $logs)
    {
        $this->general = $general;
        $this->articles = $articles;
        $this->logs = $logs;
    }

    public function index(Request $request)
    {
        $this->general->setTitle('Makaleler');
        $this->general->getUser();
        $this->articles->getAllArticles($request);
        $this->articles->returnArticlesView();
    }

    public function add()
    {
        $this->general->setTitle('Makale Ekle');
        $this->general->getUser();
        $this->articles->getTagsAsJsArray();
        $this->articles->getAuthorsAsJsArray();
        $this->articles->getAllLanguages();
        $this->articles->getAllPublicationPlaces();
        $this->general->returnClassConstantsToView('\App\Models\Article', 'types');
        $this->articles->returnArticleAddView();
    }

    public function save()
    {
        $input = request()->all();
        $user = $this->general->getUser();
        $this->articles->validateArticleDataForAdd($input);
        $item = $this->articles->saveArticleData($input, $user->id);
        $this->logs->addLogData(Log::ARTICLE_ADD, $user->id, $item->id);
        $this->articles->redirectToArticlesList();
    }

    public function edit($id)
    {
        $this->general->setTitle('Makale Düzenle');
        $this->general->getUser();
        $this->articles->getArticleDetail($id);
        $this->articles->getTagsAsJsArray();
        $this->articles->getAuthorsAsJsArray();
        $this->articles->getAllLanguages();
        $this->articles->getAllPublicationPlaces();
        $this->general->returnClassConstantsToView('\App\Models\Article', 'types');
        $this->general->returnClassConstantsToView('\App\Models\ArticleEnum', 'statuses');
        $this->articles->returnArticleEditView();
    }

    public function update($id)
    {
        $input = request()->all();
        $user = $this->general->getUser();
        $this->articles->validateArticleDataForEdit($input);
        $item = $this->articles->updateArticleData($input, $id);
        $this->logs->addLogData(Log::ARTICLE_EDIT, $user->id, $item->id);
        $this->articles->redirectToArticlesList();
    }

    public function delete($id)
    {
        $user = $this->general->getUser();
        $this->articles->deleteArticle($id);
        $this->logs->addLogData(Log::ARTICLE_DELETE, $user->id);
        $this->articles->redirectToArticlesList();
    }
}
