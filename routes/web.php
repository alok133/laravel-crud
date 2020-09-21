<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get','post'],'/admin','Admincontroller@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['auth']], function(){
	Route::match(['get','post'],'/admin/dashboard','Admincontroller@dashboard');
	Route::match(['get','post'],'/admin/add-blog','Blogcontroller@addblog');
	Route::match(['get','post'],'/admin/view-blogs','Blogcontroller@viewblogs');
	Route::match(['get','post'],'/admin/edit-blog/{blog_id}','Blogcontroller@editblog');
	Route::match(['get','post'],'/admin/delete-blog/{blog_id}','Blogcontroller@deleteblog');
	Route::match(['get','post'],'/admin/update-blog-status','Blogcontroller@updatestatus');
	//keywords route
	Route::match(['get','post'],'/admin/add-keyword/{blog_id}','Blogcontroller@addkeyword');
	Route::match(['get','post'],'/admin/view-keywords','Blogcontroller@viewkeywords');
	Route::match(['get','post'],'/admin/delete-keyword/{keyword_id}','Blogcontroller@deletekeyword');
	Route::match(['get','post'],'/admin/edit-keyword/{keyword_id}','Blogcontroller@editkeyword');
	Route::match(['get','post'],'/admin/update-keyword-status','Blogcontroller@updatestatus1');
	//Blog seo route
    Route::match(['get','post'],'/admin/add-blogseo','Blogseocontroller@addblogseo');	
    Route::match(['get','post'],'/admin/view-blogseo','Blogseocontroller@viewblogseo');
    Route::match(['get','post'],'/admin/edit-blogseo/{seo_id}','Blogseocontroller@editblogseo');
    Route::match(['get','post'],'/admin/delete-blogseo/{seo_id}','Blogseocontroller@deleteblogseo');

});

Route::get('/logout','Admincontroller@logout');