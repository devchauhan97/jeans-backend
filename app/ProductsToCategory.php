<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class ProductsToCategory extends Model
{
    
  
	protected $table = 'products_to_categories';

	protected $fillable = ['products_id', 'categories_id'];
	// protected $guarded = ['products_id'];
	// protected $guarded = ['products_id'];

	//use user id of admin
	//protected $primaryKey = 'products_id';

	public function basket(){

	//	return $this->hasMany(Basket::class,'products_id','products_id');
	}
}
