<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpotLightProduct extends Model
{
    protected $guarded = ['spot_light_id'];

	//use user id of admin
	protected $primaryKey = 'spot_light_id';
}
