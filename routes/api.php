<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/features', function (Request $request) {
    
    $http = new GuzzleHttp\Client;

    if($request->has('lga_name')){
        $url = "https://api.grid-nigeria.org/health-facilities/?cql=state_name = 'Kaduna' and lga_name = '" . $request->lga_name ."'&size=4&fields=name%2Clga_name%2Cstate_name%2Cward_name%2Cstatus";
    }else{
        $url = "https://api.grid-nigeria.org/health-facilities/?cql=state_name IN ('Kaduna')&size=4";
    }
    
    $response = $http->get($url);

    $response = json_decode($response->getBody(), true);

    $data = [];

    foreach($response["features"] as $feature){
        $properties = array_only($feature["properties"], ['global_id', 'latitude', 'longitude', 'lga_name', 'name', 'state_name', 'type', 'ward_name', 'ownership']);
        array_push($data, $properties);
    }

    return $data;
});
