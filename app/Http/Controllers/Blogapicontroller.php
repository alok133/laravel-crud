<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class Blogapicontroller extends Controller
{
    public function getBlog(){

    	$getData=Blog::all();

    	if($getData){

    		return response()->json($getData);
    	}
    }

   
}
