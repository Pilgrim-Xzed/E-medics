<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityDrug extends Model
{
    protected $fillable = [
		'facility_id',
		'drug_id',
		'quantity',
		'unit_price',
    ];

    protected $hidden = [
    ];

    public function drug()
    {
    	return $this->belongsTo(Drug::class, 'drug_id');
    }

    public function healthFacility()
    {
    	return $this->belongsTo(HealthFacility::class, 'facility_id');
    }
}
