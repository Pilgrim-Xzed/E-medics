<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityService extends Model
{
    protected $fillable = [
		'health_facility_id',
		'service_id',
	];

    protected $hidden = [
    ];

    public function service()
    {
    	return $this->belongsTo(Service::class, 'service_id');
    }

    public function healthFacility()
    {
    	return $this->belongsTo(HealthFacility::class, 'health_facility_id');
    }
}
