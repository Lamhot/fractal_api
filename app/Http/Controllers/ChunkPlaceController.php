<?php
namespace App\Http\Controllers;

use App\Models\Place;
use App\Transformer\CheckinTransformer;
use App\Transformer\PlaceTransformer;


class ChunkPlaceController extends Controller
{

    public function index()
    {
        $begin = memory_get_usage();



        Place::chunk(200, function ($places) {
            foreach ($places as $place) {
                $response[] = [
                    'id' => (int)$place->id,
                    'name' => $place->name,
                    'lat' => (float)$place->lat,
                    'lon' => (float)$place->lon,
                    'address1' => $place->address1,
                    'address2' => $place->address2,
                    'city' => $place->city,
                    'state' => $place->state,
                    'zip' => $place->zip,
                    'website' => $place->website,
                    'phone' => $place->phone
                ];
                return response()->json(['data' => $place], 200);
            }

        });


           // echo 'Total memory usage : ' . (memory_get_usage() - $begin);




    }
}
