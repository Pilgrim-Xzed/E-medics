<?php

use GuzzleHttp\Client;
use App\HealthFacility;
use Illuminate\Database\Seeder;

class Facilities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HealthFacility::truncate();

        $http = new Client;

        $url = "https://api.grid-nigeria.org/health-facilities/?cql=state_name IN ('Kaduna')&size=200";

        $response = $http->get($url);

        $response = json_decode($response->getBody(), true);

        $next = array_has($response["pager"], 'next') ? $response["pager"]["next"] : false;
        $facilities = [];

        $total_count = $response["totalFeatures"];

        foreach($response["features"] as $feature){
            $properties = array_only($feature["properties"], ['global_id', 'latitude', 'longitude', 'lga_name', 'name', 'state_name', 'type', 'ward_name', 'ownership', 'alternate_name', 'functional_status', 'ri_service_status', 'ward_code', 'lga_code', 'state_code', 'type', 'ward_id']);

            $facility = HealthFacility::where('global_id', $properties['global_id'])->get();

            if($facility->count() == 0){
                // HealthFacility::create($properties);
                $hf = new HealthFacility($properties);
                $hf->save();
            }else{
                // $facility->update($properties);
            }

        }

        while($next){

            $response = $http->get($next);

            $response = json_decode($response->getBody(), true);

            $facilities = [];

            $total_count = $response["totalFeatures"];

            foreach($response["features"] as $feature){
                $properties = array_only($feature["properties"], ['global_id', 'latitude', 'longitude', 'lga_name', 'name', 'state_name', 'type', 'ward_name', 'ownership', 'alternate_name', 'functional_status', 'ri_service_status', 'ward_code', 'lga_code', 'state_code', 'type', 'ward_id']);

                $facility = HealthFacility::where('global_id', $properties['global_id'])->get();

                if($facility->count() == 0){
                    // HealthFacility::create($properties);
                    $hf = new HealthFacility($properties);
                    $hf->save();
                }else{
                    // $facility->update($properties);
                }

            }

            $next = array_has($response["pager"], 'next') ? $response["pager"]["next"] : false;
        }
    }
}
