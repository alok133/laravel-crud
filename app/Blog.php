<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $primaryKey = 'blog_id';

	
   public function blogidcategories(){
    	return $this->hasmany('App\Blog','status');
    }
}
