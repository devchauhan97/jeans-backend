<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

//validator is builtin class in laravel
use Validator;

use DB;

//for password encryption or hash protected
use Hash;
use App\Administrator;
use Lang;

//for authenitcate login data
use Auth;
 
//for requesting a value 
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use App\Blog;
use App\BlogDescription;
use App\Events\BlogNotificationMail;
use Event;
class AdminBlogsController extends Controller
{
	
	public function index(Request $request)
	{

		$title = array('pageTitle' => Lang::get("labels.blogs"));
		$language_id            				=   '1';			
		
		$blogs = DB::table('blogs')
			 			->orderBy('blogs_id', 'ASC')
						->paginate(20);
		
		$currentTime =  array('currentTime'=>time());
		return view("admin.blogs",$title)->with('blogs', $blogs);
	}
	
	public function addBlogs(Request $request)
	{
		$title = array('pageTitle' => Lang::get("labels.Addblogs"));
		$language_id      =   '1';
		
		$result = array();
		 //get function from other controller
		$myVar = new AdminSiteSettingController();
		$result['languages'] = $myVar->getLanguages();
		
		return view("admin.addblogs", $title)->with('result', $result);
	}
	
	//addNewblogs
	public function addNewBlogs(Request $request)
	{
		$title = array('pageTitle' => Lang::get("labels.Addblogs"));
		$date_added	= date('Y-m-d h:i:s');
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();		
		$extensions = imageType();
				
		if($request->hasFile('blogs_image') and in_array($request->blogs_image->extension(), $extensions)){
			$image = $request->blogs_image;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move(storage_path('app/public').'/blogs_images/', $fileName);
			$uploadImage = 'blogs_images/'.$fileName; 
			storeImage($uploadImage);
		}else{
			$uploadImage = '';
		}	
		 
		$blogs_id = Blog::create([
					'image'  			=>   $uploadImage,
					'title'	 	 		=>   $request->title,
					'sort_description'	=>   $request->sort_description,
					'status'		 	 =>   $request->status,
					'posted_by'		 	 =>   auth()->guard('admin')->user()->myid

					])->blogs_id;
		
		$slug_flag = false;	
		BlogDescription::create([
				'description'  	    	 =>   $request->description,
				 'blogs_id'				 =>   $blogs_id,
					 ]);
		$message = Lang::get("labels.BlogAddedSuccessfully");				
		//Event::fire(new BlogNotificationMail($blogs_id));
		return redirect()->back()->withErrors([$message]);
	}
		
	//editnew
	public function editBlogs(Request $request)
	{
		$title = array('pageTitle' => Lang::get("labels.EditBlogs"));
		$language_id      =   '1';	
		$blogs_id     	  =   $request->id;	
		 
		$result = array();
		   
		$result['blogs'] =Blog::where('blogs_id','=', $blogs_id)
							->first();
		$description = BlogDescription::where( 
				 ['blogs_id'=> $blogs_id])->first(['description']);
			 		 
		$result['description'] = $description != null ? $description->description :'';
		 
		return view("admin.editblogs", $title)->with('result', $result);		
	}
	 
	//updatenew
	public function updateBlogs(Request $request)
	{
		
		$language_id      =   '1';	
		$blogs_id      =   $request->id;	
		$blogs_last_modified	= date('Y-m-d h:i:s');
		 	
		$extensions = imageType();
		//check slug
		 
		if($request->hasFile('blogs_image') and in_array($request->blogs_image->extension(), $extensions)){
			$image = $request->blogs_image;
			$fileName = time().'.'.$image->getClientOriginalName();
			$image->move(storage_path('app/public').'/blogs_images/', $fileName);
			
			$uploadImage = 'blogs_images/'.$fileName; 
			storeImage($uploadImage);
		}else{
			$uploadImage = $request->oldImage;
		}	
		
		Blog::where(['blogs_id'		 =>   $blogs_id])->update([
					'image'  			 =>   $uploadImage,
					'title'				 =>	  $request->title,
					'sort_description'	 =>   $request->sort_description, 
					'status'		 	 =>   $request->status, 
					]);
		$description = BlogDescription::where(['blogs_id'	 =>   $blogs_id])->first();

		if( count($description) ) 
			BlogDescription::where(['blog_descriptions_id'	 =>   $description->blog_descriptions_id])->update([
					 'description'	 =>   addslashes($request->description)
					]);	
		else
			BlogDescription::create([
					'blogs_id'		 =>   $blogs_id,
					'description'	 =>   addslashes($request->description)
					]);	
		 
		$message = Lang::get("labels.blogshasbeenupdatedsuccessfully");				
		return redirect()->back()->withErrors([$message]);
		
	}
	
	//deleteblogs
	public function deleteBlogs(Request $request)
	{
		DB::table('blogs')->where('blogs_id', $request->id)->delete();
		 
		return redirect()->back()->withErrors(['blogs has been deleted successfully!']);
	}
	
}
