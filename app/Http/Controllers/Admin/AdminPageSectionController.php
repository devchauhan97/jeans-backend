<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//validator is builtin class in laravel
use Validator;

use App;
use Lang;

use DB;
//for password encryption or hash protected
use Hash;
use App\Admin;

//for authenitcate login data
use Auth;


use App\PageSection;
use Illuminate\Http\Request;
use App\Http\Requests\PageSectionRequest;

class AdminPageSectionController extends Controller
{
    //listingTaxClass
    public function sections(Request $request)
    {
        $title = array('pageTitle' => Lang::get("labels.Listingsections"));      
        
        $result = array();
        $message = array();     
            
        $banners = DB::table('page_sections')->leftJoin('languages','languages.languages_id','=','page_sections.languages_id')->orderBy('page_sections.sections_id','ASC')->paginate(20);
        
        $result['message'] = $message;
        $result['sections'] = $banners;
        
        return view("admin.sections", $title)->with('result', $result);
    }
    
    //addTaxClass
    public function addSectionsImages(Request $request)
    {

        $title = array('pageTitle' => Lang::get("labels.AddSliderImage"));
        
        $result = array();
        $message = array();
        
        //get function from other controller
        $myVar = new AdminCategoriesController();
        $categories = $myVar->getSubCategories(1);
        
        //get function from other controller
        $myVar = new AdminProductsController();
        $products = $myVar->getProducts(1);     
        
        //get function from other controller
        $myVar = new AdminSiteSettingController();
        $result['languages'] = $myVar->getLanguages();
        
        $result['message'] = $message;
        $result['categories'] = $categories;
        $result['products'] = $products;
        
        return view("admin.addsectionimage", $title)->with('result', $result);
    }
    
    //addNewZone    
    public function addNewSection(PageSectionRequest $request)
    {
        
        $myVar = new AdminSiteSettingController();
        $languages = $myVar->getLanguages();        
        $extensions = imageType();
        
        $expiryDate = str_replace('/', '-', $request->expires_date);
        $expiryDateFormate = date('Y-m-d H:i:s', strtotime($expiryDate));
        $type = $request->type;
        
        if (!file_exists('section_images/')) {
            mkdir('section_images/', 0777, true);
        }
        
        if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)){
            $image = $request->newImage;
            $fileName = time().'.'.$image->getClientOriginalName();
            $image->move(storage_path('app/public').'/section_images/', $fileName);
            $uploadImage = 'section_images/'.$fileName; 
            storeImage($uploadImage);
        }else{
            $uploadImage = '';
        }
        
        if($type=='category') {
            $sections_url = $request->categories_id;
        }else if($type=='product') {
            $sections_url = $request->products_id;
        }else{
            $sections_url = '';
        }
        
        PageSection::create([
                'sections_title'    =>   $request->sections_title,
                'position'          =>$request->position,              
                'date_added'        =>   date('Y-m-d H:i:s'),
                'sections_image'    =>   $uploadImage,
                'sections_url'      =>   $sections_url,
                'status'            =>   $request->status,
                'expires_date'      =>   $expiryDateFormate,
                'type'              =>   $request->type,
                'languages_id'      =>   $request->languages_id
                ]);
                                        
        $message = Lang::get("labels.SectionAddedMessage");
       return redirect()->back()->withSuccess($message);
    }
    
    //editTaxClass
    public function editSection(Request $request)
    {        
        $title = array('pageTitle' => Lang::get("labels.EditSliderImage"));
        $result = array();      
        $result['message'] = array();
        
        $banners = DB::table('page_sections')->where('sections_id', $request->id)->get();
        $result['sections'] = $banners;  
        
        //get function from other controller
        $myVar = new AdminCategoriesController();
        $categories = $myVar->getSubCategories(1);
        
        //get function from other controller
        $myVar = new AdminProductsController();
        $products = $myVar->getProducts(1);     
        
        //get function from other controller
        $myVar = new AdminSiteSettingController();
        $result['languages'] = $myVar->getLanguages();
        
        $result['categories'] = $categories;
        $result['products'] = $products;        
        
        return view("admin.editsection",$title)->with('result', $result);
    }
    
    //updateTaxClass
    public function updateSection(PageSectionRequest $request)
    {
        
        $myVar = new AdminSiteSettingController();
        $languages = $myVar->getLanguages();        
        $extensions = imageType();
        
        $expiryDate = str_replace('/', '-', $request->expires_date);
        $expiryDateFormate = date('Y-m-d H:i:s', strtotime($expiryDate));
        $type = $request->type;
        
        if($request->hasFile('newImage') and in_array($request->newImage->extension(), $extensions)) {
            $image = $request->newImage;
            $fileName = time().'.'.$image->getClientOriginalName();
            $image->move(storage_path('app/public').'/section_images/', $fileName);
            $uploadImage = 'section_images/'.$fileName; 
            storeImage($uploadImage);
        } else {
            $uploadImage = $request->oldImage;
        }
        
        if( $type == 'category' ) {
            $sections_url = $request->categories_id;
        } else if($type=='product') {
            $sections_url = $request->products_id;
        } else {
            $sections_url = '';
        }
        
        $countryData = array();     
        $message = Lang::get("labels.SectionUpdatedMessage");
                
        $countryUpdate = PageSection::where('sections_id', $request->id)->update([
                    'position'              =>$request->position, 
                    'date_status_change'    =>   date('Y-m-d H:i:s'),
                    'sections_title'        =>   $request->sections_title,
                    'date_added'            =>   date('Y-m-d H:i:s'),
                    'sections_image'        =>   $uploadImage,
                    'sections_url'          =>   $sections_url,
                    'status'                =>   $request->status,
                    'expires_date'          =>   $expiryDateFormate,
                    'type'                  =>   $request->type,
                    'languages_id'          =>   $request->languages_id
                    ]);
                
        return redirect()->back()->withSuccess($message);
    }
    
    //deleteCountry
    public function deleteSection(Request $request)
    {
        DB::table('page_sections')->where('sections_id', $request->sections_id)->delete();
        return redirect()->back()->withErrors([Lang::get("labels.SectionDeletedMessage")]);
    }
}
