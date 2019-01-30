<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class SlidersImage extends Model
{
  
  
	protected $table = 'sliders_images';

	protected $guarded = ['sliders_id'];

	//use user id of admin
	protected $primaryKey = 'sliders_id'; 

	 

	public function scopeOfType($query, $language_id,)
    {
        return $query->where('status', '=', '1')
					   ->where('languages_id', '=', 1)
					   ->where('expires_date', '>', time());
    }
}
