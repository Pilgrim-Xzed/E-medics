<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    	'name',
    ];

    protected $hidden = [
    ];

    public function healthFacilities() {
		return $this->belongsToMany('App\HealthFacility', 'facility_services', 'service_id', 'health_facility_id');
	}
}
