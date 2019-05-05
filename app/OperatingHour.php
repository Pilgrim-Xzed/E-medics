<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatingHour extends Model
{
    protected $fillable = [
    	'health_facility_id',
    	'day',
    	'opening_time',
    	'closing_time',
    ];

    protected $hidden = [
    ];

    protected $casts = [
        'opening_time' => 'time',
        'closing_time' => 'time',
    ];

    public function healthFacility()
    {
    	return $this->belongsTo(HealthFacility::class);
    }

}
