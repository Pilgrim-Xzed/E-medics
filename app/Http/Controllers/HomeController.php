<?php

namespace App\Http\Controllers;

use App\Patient;
use GuzzleHttp\Client;
use App\HealthFacility;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $facilities = HealthFacility::all()->random(9);
        $total_count = HealthFacility::count();
        $total_patients = Patient::count();

        $wards = array_unique(HealthFacility::all()->pluck('ward_name')->toArray());

        $wards = array_sort($wards);

        // $http = new Client;

        // $url = "https://api.grid-nigeria.org/health-facilities/?cql=state_name IN ('Kaduna')&size=3";

        // $response = $http->get($url);

        // $response = json_decode($response->getBody(), true);

        // $facilities = [];

        // $total_count = $response["totalFeatures"];
        // foreach($response["features"] as $feature){
        //     $properties = array_only($feature["properties"], ['global_id', 'latitude', 'longitude', 'lga_name', 'name', 'state_name', 'type', 'ward_name', 'ownership']);
        //     array_push($facilities, $properties);
        // }


        return view('welcome', compact('facilities', 'total_count', 'total_patients', 'wards'));
    }

    public function search(Request $request)
    {

        if($request->ward_name !== '' && $request->ward_name !== null){
            $result_count = HealthFacility::where('ward_name', $request->ward_name)->count();
            $facilities = HealthFacility::where('ward_name', $request->ward_name);
        }else if($request->has('lga_name') && $request->lga_name !== '' && $request->lga_name !== null){
            $result_count = HealthFacility::where('lga_name', $request->lga_name)->count();
            $facilities = HealthFacility::where('lga_name', $request->lga_name);
        }else if($request->has('name') && $request->name !== '' && $request->name !== null){
            $result_count = HealthFacility::where('name', 'LIKE', "%" . $request->name . "%")->count();
            $facilities = HealthFacility::where('name', 'LIKE', "%" . $request->name . "%");
        }else{
            return redirect('home');
        }
        if(($request->lga_name || $request->ward_name) && ($request->name !== '' || $request->name !== null)){
            $result_count = $facilities->where('name', 'LIKE', "%" . $request->name . "%")->count();
            $facilities = $facilities->where('name', 'LIKE', "%" . $request->name . "%");
        }

        $total_count = HealthFacility::count();
        $total_patients = Patient::count();

        $wards = array_unique(HealthFacility::all()->pluck('ward_name')->toArray());

        $wards = array_sort($wards);

        $searched_lga = $request->lga_name;
        $searched_name = $request->name;
        $searched_ward = $request->ward_name;

        $facilities = $facilities->get()->sortBy('rate')->take(9);

        return view('welcome', compact('facilities', 'total_count', 'total_patients', 'wards', 'result_count', 'searched_name', 'searched_lga', 'searched_ward'));
    }

    public function facilities(Request $request)
    {
        return $request->all();
    }

    public function createComplaint()
    {
        return view('contact');
    }
}
