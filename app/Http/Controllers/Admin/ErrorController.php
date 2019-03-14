<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    //
    public function notFound()
    {
    	$title = array('pageTitle' => 'Not Found');
    	//$result['commonContent'] = $this->commonContent();
    	return view("errors.404",$title);

    }
    public function fatal() 
    {
        $title = array('pageTitle' => 'Not Found');
    	return view("errors.500", $title);
    }
}
