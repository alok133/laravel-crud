<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcategory extends Model
{
    public function categories(){
    	return $this->hasmany('App\Blogcategory','status');
    }
}
