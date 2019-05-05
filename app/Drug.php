<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = [
    	'name',
    	'unit_price',
    	'quantity',
    ];

    protected $hidden = [
    ];

    public function healthFacilities() {
		return $this->belongsToMany('App\HealthFacility', 'facility_drugs', 'drug_id', 'facility_id');
	}
}
