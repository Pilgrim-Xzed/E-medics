<?php

use Illuminate\Database\Seeder;
use App\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::truncate();

    	DB::table('users')->insert([
    		'name' => 'Dalhatu Njidda',
    		'username' => 'dalsnjidda',
    		'email' => 'admin@example.com',
    		'address' => '46 Hong Avenue, Kaduna',
    		'phone' => '09023084045',
    		'password' => bcrypt('password'),
    		'role' => 1,
    	]);

    	DB::table('users')->insert([
    		'name' => 'Dr. Ahmad Sumaila',
    		'username' => 'asumaila',
    		'email' => 'user@example.com',
    		'address' => 'Hospital Road, Kauru, Kaduna',
    		'phone' => '08132842499',
    		'password' => bcrypt('password'),
    		'role' => 2,
    	]);
    }
}
