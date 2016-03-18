<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('api', ['middleware' => 'oauth', function() {
    //echo “success authentication”;
    $user_id=Authorizer::getResourceOwnerId(); // the token user_id
    $user=\App\User::find($user_id);// get the user data from database
    return Response::json($user);
}]);

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::get('/users', 'UserController@index');
Route::get('/users/{id}', 'UserController@show');
Route::get('/users/{id}/checkins', 'UserController@getCheckins');

Route::get('/places', 'PlaceController@index');
Route::get('/json_places', 'JsonPlaceController@index');
Route::get('/chunk_places', 'ChunkPlaceController@index');
Route::get('/places/{id}', 'PlaceController@show');
Route::get('/places/{id}/checkins', 'PlaceController@getCheckins');
Route::get('/places/{id}/image', 'PlaceController@uploadImage');
