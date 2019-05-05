<?php

use Illuminate\Database\Seeder;
use App\Service;

class Services extends Seeder
{

	protected $services = [
		'Radiology/Imaging',
		'Surgery',
		'Intensive Care Unit (ICU)',
		'Emergency Room (ER)',
		'Labor & Delivery',
		'Cardiac Care',
		'Lab',
		'Pharmacy',
		'Neonatal Intensive Care Unit (NICU)',
		'Morgue',
		'Pediatrics',
		'X-ray',
		'Ambulance',
	];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Service::truncate();

    	foreach($this->services as $service) {
    		DB::table('services')->insert([
	            'name' => $service,
	        ]);
    	}
    }
}
