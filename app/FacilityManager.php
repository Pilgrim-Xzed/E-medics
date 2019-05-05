<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityManager extends Model
{
	protected $fillable = [
		'name',
		'username',
		'email',
		'address',
		'phone',
		'password',
		'health_facility_id',
    ];

    protected $hidden = [
    ];

    public function healthFacility()
    {
    	return $this->hasOne(HealthFacility::class);
    }
}
