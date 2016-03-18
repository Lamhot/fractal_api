<?php
namespace App\Http\Controllers;

use App\Models\Place;
use App\Transformer\CheckinTransformer;
use App\Transformer\PlaceTransformer;


class JsonPlaceController extends Controller
{
    public function index()
    {
        $begin = memory_get_usage();
        $places = Place::take(10)->get();

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
        }
        echo 'Total memory usage : ' . (memory_get_usage() - $begin);
        return response()->json(['data' => $response], 200);

    }
}

$table->integer('user_id')->unsigned();
$table->foreign('user_id')->references('id')->on('users');


