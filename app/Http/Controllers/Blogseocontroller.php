<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Blogseo;

class Blogseocontroller extends Controller
{
    public function addblogseo(Request $request){

    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>";print_r($data);die;
    		$blogseo = new Blogseo;
    		$blogseo->blog_id = $data['blog_id'];
            $blogseo->meta_title = $data['meta_title'];
    		$blogseo->meta_keyword = $data['meta_keyword'];
    		if(!empty($data['meta_description'])){
    			$blogseo->meta_description = $data['meta_description'];
    		}else{
    			$blogseo->meta_description = '';
    		}
    		$blogseo->save();
    		return redirect('/admin/view-blogseo')->with('flash_message_success','blog seo added!!');
    	}
    	$blogidcategories = Blog::where(['status'=>1])->get();
        $blogidcategories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($blogidcategories as $cat){
            $blogidcategories_dropdown .= "<option value='" .$cat->blog_id."'>".$cat->blog_id."<option>";
        }
    	return view('admin.blogseo.add_blogseo')->with(compact('blogidcategories_dropdown'));
    }

    public function viewblogseo(){
    	$blogs = Blogseo::get();
    	return view('admin.blogseo.view_blogseo')->with(compact('blogs'));
    }

    public function editblogseo(Request $request,$id=null){
    	if($request->isMethod('post')){
    		$data = $request->all();

    		if(empty($data['meta_description'])){
    			$data['meta_description'] = '';
    		}
    		Blogseo::where(['seo_id'=>$id])->update(['blog_id'=>$data['blog_id'], 'meta_title'=>$data['meta_title'],'meta_keyword'=>$data['meta_keyword']]);
    		return redirect('/admin/view-blogseo')->with('flash_message_success','blog seo updated successfully!!');
    	}
    	$seodetails = Blogseo::where(['seo_id'=>$id])->first();

        //category dropdown code
        $blogidcategories = Blog::where(['status'=>1])->get();
        $blogidcategories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($blogidcategories as $cat){
            if($cat->blog_id==$seodetails->blog_id){
                $selected  ="selected";
            }else{
                $selected = "";
            }
             $blogidcategories_dropdown .="<option value='" .$cat->blog_id."'".$selected.">".$cat->blog_id."<option>";
        }
    	return view('admin.blogseo.edit_blogseo')->with(compact('seodetails','blogidcategories_dropdown'));
    }

    public function deleteblogseo($id=null){
    	Blogseo::where(['seo_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_error','Blog seo deleted!!!');
    }
}
