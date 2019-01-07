<?php
/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
Version: 2.8
*/
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//validator is builtin class in laravel
use Validator;

use App;
use Lang;

use DB;
//for password encryption or hash protected
use Hash;
use App\Administrator;

//for authenitcate login data
use Auth;

//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

//for requesting a value 
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;


class AdminBannersController extends Controller
{
	
	//listingTaxClass
	public function banners(Request $request){
		$title = array('pageTitle' => Lang::get("labels.ListingBanners"));		
		
		$result = array();
		$message = array();
			
		$banners = DB::table('banners')->paginate(20);
		
		$result['message'] = $message;
		$result['banners'] = $banners;
		
		return view("admin.banners", $title)->with('result', $result);
	}
	
	//addTaxClass
	public function addbanner(Request $request){
		$title = array('pageTitle' => Lang::get("labels.AddBanner"));
		
		$result = array();
		$message = array();
		
		//get function from other controller
		$myVar = new AdminCategoriesController();
		$categories = $myVar->getSubCategories(1);
		
		//get function from other controller
		$myVar = new AdminProductsController();
		$products = $myVar->getProducts(1);
		//print_r($products);
		$result['message'] = $message;
		$result['categories'] = $categories;
		$result['products'] = $products;
		
		return view("admin.addbanner", $title)->with('result', $result);
	}
	
	//addNewZone	
	public function addNewBanner(Request $request){
		
		$expiryDate = str_replace('/', '-', $request->expires_date);
		$expiryDateFormate = date('Y-m-d H:i:s', strtotime($expiryDate));
		$type = $request->type;
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$extensions = $myVar->imageType();	
		$setting = $myVar->getSetting();	
		
		if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)){
			$image = $request->newImage;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move(storage_path('app/public').'/banner_images/', $fileName);
			$uploadImage = 'banner_images/'.$fileName; 
		}else{
			$uploadImage = '';
		}
		
		if($type=='category'){
			$banners_url = $request->categories_id;
		}else if($type=='product'){
			$banners_url = $request->products_id;
		}else{
			$banners_url = '';
		}
		
		DB::table('banners')->insert([
				'banners_title'  		 =>   $request->banners_title,
				'date_added'	 		 =>   date('Y-m-d H:i:s'),
				'banners_image'			 =>	  $uploadImage,
				'banners_url'	 		 =>   $banners_url,
				'status'	 			 =>   $request->status,
				'expires_date'			 =>	  $expiryDateFormate,
				'type'					 =>	  $request->type
				]);
										
		$message = Lang::get("labels.BannerAddedMessage");
		return redirect()->back()->withErrors([$message]);
	}
	
	//editTaxClass
	public function editbanner(Request $request){		
		$title = array('pageTitle' => Lang::get("labels.EditBanner"));
		$result = array();		
		$result['message'] = array();
		
		$banners = DB::table('banners')->where('banners_id', $request->id)->get();
		$result['banners'] = $banners;	
		
		//get function from other controller
		$myVar = new AdminCategoriesController();
		$categories = $myVar->getSubCategories(1);
		
		//get function from other controller
		$myVar = new AdminProductsController();
		$products = $myVar->getProducts(1);
		
		$result['categories'] = $categories;
		$result['products'] = $products;		
		
		return view("admin.editbanner",$title)->with('result', $result);
	}
	
	//updateTaxClass
	public function updateBanner(Request $request){
		
		$title = array('pageTitle' => Lang::get("labels.EditBanner"));
		
		$expiryDate = str_replace('/', '-', $request->expires_date);
		$expiryDateFormate = date('Y-m-d H:i:s', strtotime($expiryDate));
		$type = $request->type;
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$extensions = $myVar->imageType();	
		$setting = $myVar->getSetting();	
		
		if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)){
			$image = $request->newImage;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move(storage_path('app/public').'/banner_images/', $fileName);
			$uploadImage = 'banner_images/'.$fileName; 
		}else{
			$uploadImage = $request->oldImage;
		}
		
		if($type=='category'){
			$banners_url = $request->categories_id;
		}else if($type=='product'){
			$banners_url = $request->products_id;
		}else{
			$banners_url = '';
		}
		
		$countryData = array();		
		$message = Lang::get("labels.BannerUpdatedMessage");
				
		$countryUpdate = DB::table('banners')->where('banners_id', $request->id)->update([
					'date_status_change'	 =>   date('Y-m-d H:i:s'),
					'banners_title'  		 =>   $request->banners_title,
					'date_added'	 		 =>   date('Y-m-d H:i:s'),
					'banners_image'			 =>	  $uploadImage,
					'banners_url'	 		 =>   $banners_url,
					'status'	 			 =>   $request->status,
					'expires_date'			 =>	  $expiryDateFormate,
					'type'					 =>	  $request->type
					]);
				
		return redirect()->back()->withErrors([$message ]);
	}
	
	//deleteCountry
	public function deleteBanner(Request $request){
		DB::table('banners')->where('banners_id', $request->banners_id)->delete();
		return redirect()->back()->withErrors([Lang::get("labels.BannerDeletedMessage")]);
	}
}
