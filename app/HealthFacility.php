<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class HealthFacility extends Model
{

	protected $table = "health_facilities";

	use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
	}

    protected $fillable = [
		'global_id',
		'latitude',
		'longitude',
		'lga_name',
		'name',
		'slug',
		'state_name',
		'type',
		'ward_name',
		'ownership',
		'alternate_name',
		'functional_status',
		'ri_service_status',
		'ward_code',
		'lga_code',
		'state_code',
		'type',
		'address',
    	'phone',
    	'email',
    	'facebook',
    	'twitter',
    	'instagram',
    	'facility_manager_id',
    ];

    protected $hidden = [
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'facility_manager_id');
	}

	public function services(){
		return $this->belongsToMany('App\Service', 'facility_services', 'health_facility_id', 'service_id');
	}

	public function drugs(){
		return $this->belongsToMany('App\Drug', 'facility_drugs', 'facility_id', 'drug_id');
	}

	public function reviews(){
		return $this->hasMany('App\Review');
	}


	public function getRateAttribute(){
		return $this->reviews->count() > 0 ? $this->reviews->avg('rate') : 'N/A';
	}

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'slug';

    }
}
