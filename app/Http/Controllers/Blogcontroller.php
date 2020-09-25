<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Blog;
use App\Blogcategory;
use App\Blogkeyword;

class Blogcontroller extends Controller
{
     public function addblog(Request $request){

    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>";print_r($data);die;
    		$blog = new Blog;
            $blog->blogcategoryid = $data['blogcategoryid'];
    		$blog->name = $data['blog_name'];
    		if(!empty($data['blog_description'])){
    			$blog->description = $data['blog_description'];
    		}else{
    			$blog->description = '';
    		}
    		

    		//upload image
             $url=" http://127.0.0.1:8000/storage/";
    		if($request->hasfile('banner_image')){
    			$file = $request->file('banner_image');
    			$extension = $file->getClientOriginalExtension();
    			// $filename = time().'.'.$extension;
    			// $file->move('upload/blog/',$filename);
    			// $blog->banner_image = $filename;
                 $path=$request->file('banner_image')->storeAs('blog', time().'.'.$extension);
                 $blog->banner_image=$path;
                 $blog->bannerimgpath=$url.$path;
    		}else{
    			return $request;
    			$blog->banner_image = '';
    		}
    		
             $url=" http://127.0.0.1:8000/storage/";
            if($request->hasfile('main_image')){
                $file = $request->file('main_image');
                $extension = $file->getClientOriginalExtension();
                // $filename = time().'.'.$extension;
                // $file->move('upload/blog/',$filename);
                // $blog->banner_image = $filename;
                 $path=$request->file('main_image')->storeAs('mainblog', time().'.'.$extension);
                 $blog->main_image=$path;
                 $blog->mainimgpath=$url.$path;
            }else{
                return $request;
                $blog->main_image = '';
            }

    		$blog->save();
    		return redirect('/admin/view-blogs')->with('flash_message_success','blog added!!');
    	}
        
        $categories = Blogcategory::where(['status'=>1])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value='" .$cat->categoryid."'>".$cat->category_name."<option>";
        }
    	return view('admin.blogs.add_blog')->with(compact('categories_dropdown'));
    }

    public function viewblogs(){
    	$viewblogs = Blog::get();
    	return view('admin.blogs.view_blogs')->with(compact('viewblogs'));
    }

     public function editblog(Request $request,$id=null){
    	if($request->isMethod('post')){
    		$data = $request->all();

    		if($request->hasfile('banner_image')){
    			$file = $request->file('banner_image');
    			$extension = $file->getClientOriginalExtension();
    			$filename = time().'.'.$extension;
    			$file->move('upload/blog/',$filename);
    			
    		}else if(!empty($data['current_image'])){
                 $filename = $data['current_image'];
    		}else{
    			$filename = '';
    		}

            if($request->hasfile('main_image')){
                $file = $request->file('main_image');
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file->move('upload/mainblog/',$filename);
                
            }else if(!empty($data['current_image1'])){
                 $filename = $data['current_image1'];
            }else{
                $filename = '';
            }
    		if(empty($data['blog_description'])){
    			$data['blog_description'] = '';
    		}
    		Blog::where(['blog_id'=>$id])->update(['blogcategoryid'=>$data['blogcategoryid'], 'name'=>$data['blog_name'],'banner_image'=>$filename,'main_image'=>$filename]);
    		return redirect('/admin/view-blogs')->with('flash_message_success','blog updated successfully!!');
    	}
    	$blogdetails = Blog::where(['blog_id'=>$id])->first();

        //category dropdown code
        $categories = Blogcategory::where(['status'=>1])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->categoryid==$blogdetails->blogcategoryid){
                $selected  ="selected";
            }else{
                $selected = "";
            }
             $categories_dropdown .="<option value='" .$cat->categoryid."'".$selected.">".$cat->category_name."<option>";
        }
    	return view('admin.blogs.edit_blog')->with(compact('blogdetails','categories_dropdown'));

        
    }

     public function deleteblog($id=null){
    	Blog::where(['blog_id'=>$id])->delete();
    	return redirect()->back()->with('flash_message_error','Blog deleted!!!');
    }

    public function updatestatus(Request $request,$id=null){
        $data = $request->all();
        Blog::where('blog_id',$data['blog_id'])->update(['status'=>$data['status']]);
    }
    //keywords coding

    public function addkeyword(Request $request,$id=null){
        $blogdetails = Blog::where(['blog_id'=>$id])->first();
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $keyword = new Blogkeyword;
            $keyword->blog_id = $id;
            $keyword->keyword_name = $data['keyword_name'];
            $keyword->save();

            return redirect('/admin/view-keywords')->with('flash_message_success','keyword added!!');

        }
        
         return view('admin.blogs.add_keyword')->with(compact('blogdetails'));
    }

    public function viewkeywords(){
        $viewkeywords = Blogkeyword::get();
        return view('admin.blogs.view_keywords')->with(compact('viewkeywords'));
    }

    public function editkeyword(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            Blogkeyword::where(['keyword_id'=>$id])->update(['keyword_name'=>$data['keyword_name']]);

            return redirect('/admin/view-keywords')->with('flash_message_success','keyword updated!!');
        }
        $keyworddetails = Blogkeyword::where(['keyword_id'=>$id])->first();
        return view('admin.blogs.edit_keyword')->with(compact('keyworddetails'));
    }

     public function deletekeyword($id=null){
        Blogkeyword::where(['keyword_id'=>$id])->delete();
        return redirect()->back()->with('flash_message_error','keyword deleted!!!');
    }
     
    public function updatestatus1(Request $request,$id=null){
        $data = $request->all();
        Blogkeyword::where('keyword_id',$data['keyword_id'])->update(['status'=>$data['status']]);
    }
}
