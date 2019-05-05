<?php

use Illuminate\Database\Seeder;
use App\Drug;
use Faker\Factory as Faker;

class Drugs extends Seeder
{
	protected $drugs = [
		'Acetaminophen',
		'Adderall',
		'Alprazolam',
		'Amitriptyline',
		'Amlodipine',
		'Amoxicillin',
		'Ativan',
		'Atorvastatin',
		'Azithromycin',
		'Biseptol',
		'Ciclobenzaprina',
		'Ciprofloxacin',
		'Citalopram',
		'Clindamycin',
		'Clonazepam',
		'Curam',
		'Cyclobenzaprine',
		'Cymbalta',
		'Diclofenaco',
		'Disflatyl',
		'Doxycycline',
		'Duvadilan',
		'Efedrin',
		'Flanax',
		'Fluimucil',
		'Gabapentin',
		'Hydrochlorothiazide',
		'Ibuprofen',
		'Lexapro',
		'Lisinopril',
		'Loratadine',
		'Lorazepam',
		'Losartan',
		'Lyrica',
		'Meloxicam',
		'Metformin',
		'Metoprolol',
		'Naproxen',
		'Navidoxine',
		'Nistatin',
		'Olfen',
		'Omeprazole',
		'Oxycodone',
		'Pantoprazole',
		'Pentrexyl',
		'Prednisone',
		'Primolut Nor',
		'Trazodone',
		'Wellbutrin',
		'Xanax',
		'Zoloft',
	];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Drug::truncate();

    	$faker = Faker::create();

    	foreach($this->drugs as $drug) {
    		DB::table('drugs')->insert([
	            'name' => $drug,
	            'unit_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 1500),
	            'quantity' => $faker->numberBetween(100,1000),
	        ]);
    	}
    }
}
