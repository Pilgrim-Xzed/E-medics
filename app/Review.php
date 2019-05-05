<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['user_id', 'health_facility_id', 'review', 'rate'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function facility(){
        return $this->belongsTo('App\HealthFacility');
    }
    
}
