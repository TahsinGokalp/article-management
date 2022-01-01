<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Services\GeneralService;
use App\Services\LogService;
use App\Services\PublicationPlaceService;

class PublicationPlaceController extends Controller
{
    private $general;

    private $places;

    private $logs;

    public function __construct(GeneralService $general, PublicationPlaceService $places, LogService $logs)
    {
        $this->general = $general;
        $this->places = $places;
        $this->logs = $logs;
    }

    public function index()
    {
        $this->general->setTitle('Yayın Yerleri');
        $this->general->getUser();
        $this->places->getAllPublicationPlaces();
        $this->places->returnPublicationPlacesView();
    }

    public function add()
    {
        $this->general->setTitle('Yayın Yeri Ekle');
        $this->general->getUser();
        $this->places->returnPublicationPlaceAddView();
    }

    public function save()
    {
        $input = request()->only('text');
        $user = $this->general->getUser();
        $this->places->validatePublicationPlaceData($input);
        $item = $this->places->savePublicationPlaceData($input);
        $this->logs->addLogData(Log::PUBLICATION_PLACE_ADD, $user->id, $item->id);
        $this->places->redirectToPublicationPlacesList();
    }

    public function edit($id)
    {
        $this->general->setTitle('Yayın Yeri Düzenle');
        $this->general->getUser();
        $this->places->getPublicationPlaceDetail($id);
        $this->places->returnPublicationPlaceEditView();
    }

    public function update($id)
    {
        $input = request()->only('text');
        $user = $this->general->getUser();
        $this->places->validatePublicationPlaceData($input);
        $item = $this->places->updatePublicationPlaceData($input, $id);
        $this->logs->addLogData(Log::PUBLICATION_PLACE_EDIT, $user->id, $item->id);
        $this->places->redirectToPublicationPlacesList();
    }

    public function delete($id)
    {
        $user = $this->general->getUser();
        $this->places->deletePublicationPlace($id);
        $this->logs->addLogData(Log::PUBLICATION_PLACE_DELETE, $user->id);
        $this->places->redirectToPublicationPlacesList();
    }
}
