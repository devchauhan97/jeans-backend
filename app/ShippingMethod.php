<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class ShippingMethod extends Model
{
   
  
	protected $table = 'shipping_methods';

	protected $guarded = ['shipping_methods_id'];

	//use user id of admin
	protected $primaryKey = 'shipping_methods_id';  

	public function shipping_description()
	{

		//return $this->hasOne(ShippingDescription::class,'products_id');
	}
}
