<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   public function blogidcategories(){
    	return $this->hasmany('App\Blog','status');
    }
}
