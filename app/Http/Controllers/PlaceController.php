<?php
namespace App\Http\Controllers;

use App\Models\Place;
use App\Transformer\CheckinTransformer;
use App\Transformer\PlaceTransformer;

class PlaceController extends ApiController
{
    public function index()
    {
        $begin = memory_get_usage();
        $places = Place::take(10)->get();

         $this->respondWithCollection($places, new PlaceTransformer);
        echo 'Total memory usage : ' . (memory_get_usage() - $begin);
    }

    public function show($placeId)
    {
        $place = Place::find($placeId);

        if (! $place) {
            return $this->errorNotFound('Place not found');
        }
        
        return $this->respondWithItem($place, new PlaceTransformer);
    }

    public function getCheckins($placeId)
    {
        $place = Place::find($placeId);

        if (! $place) {
            return $this->errorNotFound('Place not found');
        }

        return $this->respondWithCollection($place->checkins, new CheckinTransformer);
    }

    public function uploadImage($placeId)
    {
        $place = Place::find($placeId);

        if (! $place) {
            return $this->errorNotFound('Place not found');
        }

        exit('This would normally upload an image somewhere but that is hard.');
    }
}
