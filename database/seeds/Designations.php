<?php

use Illuminate\Database\Seeder;
use App\Designation;

class Designations extends Seeder
{
	protected $designations = [
		'Physician',
		'Nurse',
		'Midwife',
		'Technician',
		'Therapist',
		'Medical Assistants',
		'Pharmacists',
		'Medical Laboratory Technologist',
		'Dietitian',
	];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::truncate();

    	foreach($this->designations as $designation) {
    		DB::table('designations')->insert([
	            'name' => $designation,
	        ]);
    	}
    }
}
