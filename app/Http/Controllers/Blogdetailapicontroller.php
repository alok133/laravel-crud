<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class Blogdetailapicontroller extends Controller
{
     public function showblog($blog_id){
    	$Blogdetail = Blog::find($blog_id);

    	if($Blogdetail){

    		return response()->json($Blogdetail);
    	}
    }
}
