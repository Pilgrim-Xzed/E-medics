<?php

use Illuminate\Database\Seeder;
use App\HealthFacility;
use App\Service;
use App\FacilityService;
use App\FacilityDrug;
use App\Drug;
use Faker\Factory as Faker;

class FacilityServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	FacilityService::truncate();
    	FacilityDrug::truncate();

        $services = Service::all();
        $drugs = Drug::all();
        $hfs = HealthFacility::all();

        $faker = Faker::create();

        foreach ($hfs as $hf) {
        	$facilityServices = $services->random(9)->all();
        	$facilityDrugs = $drugs->random(30)->all();
        	foreach ($facilityServices as $fs) {
        		$hf->services()->attach($fs->id);
        	}
        	foreach ($facilityDrugs as $fd) {
        		$hf->drugs()->attach($fd->id, [
        			'unit_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 1500),
        			'quantity' => $faker->numberBetween(5,200),
        		]);
        	}
        }
    }
}
