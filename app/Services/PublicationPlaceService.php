<?php

namespace App\Services;

use App\Models\PublicationPlace;
use Illuminate\Support\Facades\Validator;

class PublicationPlaceService
{
    public function getAllPublicationPlaces()
    {
        $places = PublicationPlace::all();
        view()->share('places', $places);

        return $places;
    }

    public function validatePublicationPlaceData($input)
    {
        $rules = [
            'text' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            redirect()->back()->withInput()->withErrors($validator->messages())->throwResponse();
        }
    }

    public function savePublicationPlaceData($input)
    {
        $item = PublicationPlace::firstOrCreate(['text' => $input['text']]);

        return $item;
    }

    public function getPublicationPlaceDetail($id)
    {
        $place = PublicationPlace::find($id);
        view()->share('item', $place);

        return $place;
    }

    public function updatePublicationPlaceData($input, $id)
    {
        $item = PublicationPlace::find($id);
        $item->text = $input['text'];
        $item->save();

        return $item;
    }

    public function deletePublicationPlace($id)
    {
        PublicationPlace::destroy($id);
    }

    public function redirectToPublicationPlacesList()
    {
        redirect(route('publicationPlaces'))->with(['success' => 1])->throwResponse();
    }

    public function returnPublicationPlacesView()
    {
        return response()->view('publication_places.index')->throwResponse();
    }

    public function returnPublicationPlaceAddView()
    {
        return response()->view('publication_places.add')->throwResponse();
    }

    public function returnPublicationPlaceEditView()
    {
        return response()->view('publication_places.edit')->throwResponse();
    }
}
