<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';

    protected $fillable =  ['global_id', 'user_id', 'email', 'phone', 'address'];
}
