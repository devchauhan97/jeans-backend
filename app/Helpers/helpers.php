<?php

 
use Illuminate\Support\Facades\Storage;
 
 //create random password for social links
function createRandomPassword() { 
    $pass = substr(md5(uniqid(mt_rand(), true)) , 0, 8);    
    return $pass; 
}
  
function imageType()
{   
    $extensions = array('gif','jpg','jpeg','png');  
    return $extensions;
}  

function slugify($slug)
{
    
  // replace non letter or digits by -
  $slug = preg_replace('~[^\pL\d]+~u', '-', $slug);

  // transliterate
  if (function_exists('iconv')){
    $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
  }

  // remove unwanted characters
  $slug = preg_replace('~[^-\w]+~', '', $slug);

  // trim
  $slug = trim($slug, '-');

  // remove duplicate -
  $slug = preg_replace('~-+~', '-', $slug);

  // lowercase
  $slug = strtolower($slug);

  if (empty($slug)) {
    return 'n-a';
  }

  return $slug;
}

function store(Request $request)
{
    if($request->hasFile('newImage')) {
         
        //get filename with extension
        $filenamewithextension = $request->file('newImage')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('newImage')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.uniqid().'.'.$extension;
 
        //Upload File to external server
        Storage::disk('ftp')->put($filenametostore, fopen($request->file('newImage'), 'r+'));
        return $filenametostore ;
        //Store $filenametostore in the database
    }
 
    
}

function getZoneCountry($zone_country_id){

    $zone = DB::table('zones')->where('zone_country_id', $zone_country_id)->get(); 
    
    return $zone;

}

function storeImage($uploadImage)
{
    $file_local = Storage::disk('public')->get($uploadImage);

    if(App::environment('APP_ENV') == 'local')
      $uploadImage= 'images/'.$uploadImage;

    $file_ftp = Storage::disk('ftp')->put($uploadImage, $file_local); 
}

function getFtpImage($imagepath)
{

    $host =Config::get('filesystems.disks.ftp.host');
    $image ='http://'.$host.'/'.$imagepath;
  
    return $image;
}

function resizeImage($request) {


    if ($request->hasFile('photo')) {
        
        $image      = $request->file('photo');
        $fileName   = time() . '.' . $image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->resize(120, 120, function ($constraint) {
            $constraint->aspectRatio();                 
        });

        $img->stream(); // <-- Key point

        //dd();
        Storage::disk('local')->put('images/1/smalls'.'/'.$fileName, $img, 'public');
    }

}