<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = [
    	'name',
    	'code',
    	'status',
    	'lga_code',
    	'lga_name',
    	'state_code',
    	'state_name',
    ];

    protected $hidden = [
    ];
}
