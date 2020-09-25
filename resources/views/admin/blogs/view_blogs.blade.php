@extends('admin.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-image"></i>
               </div>
               <div class="header-title">
                  <h1>View Blogs</h1>
                  <small>Blogs List</small>
               </div>
            </section>
             @if(Session::has('flash_message_error'))
                <div class="alert alert-sm alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
                @endif

                @if(Session::has('flash_message_success'))
                <div class="alert alert-sm alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
                @endif

               <div id="message_success" style="display: none;" class="alert alert-sm alert-success">Enabled</div>
                <div id="message_error" style="display: none;" class="alert alert-sm alert-danger">Disabled</div>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>View Blogs</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('admin/add-blog')}}"> <i class="fa fa-plus"></i> Add Blog
                                 </a>  
                              </div>
                              
                           </div>
                           <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Blog ID</th>
                                       <th>BlogcategoryID</th>
                                       <th>Name</th>
                                       <th>Description</th>
                                       <th>Banner Image</th>
                                       <th>Main Image</th>
                                       <th>Status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($viewblogs as $viewblog)
                                    <tr>
                                       <td>{{$viewblog->blog_id}}</td>
                                       <td>{{$viewblog->blogcategoryid}}</td>
                                       <td>{{$viewblog->name}}</td>
                                       <td>{{$viewblog->description}}</td>
                                       <td>
                                       <!-- 	@if(!empty($viewblog->banner_image)) -->
                                       	<img src="<?php echo asset("storage/$viewblog->banner_image")?>" alt="" style="width: 100px; height: 100px;">
                                       </td>
                                      <!--  @endif -->
                                       <td>
                                       <!--  @if(!empty($viewblog->main_image)) -->
                                        <img src="<?php echo asset("storage/$viewblog->main_image")?>" alt="" style="width: 100px; height: 100px;">
                                       </td>
                                       @endif
                                         <td>
                                          <input type="checkbox" class="blogstatus btn btn-success" rel="{{$viewblog->blog_id}}" data-toggle="toggle" data-on="Enabled" data-off="disabled" data-onstyle="success" data-offstyle="danger" @if($viewblog['status']=="1") checked @endif>
                                          <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div>
                                       </td>
                                         <td>
                                          <a href="{{url('/admin/edit-blog/' .$viewblog->blog_id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                          <a href="{{url('/admin/delete-blog/' .$viewblog->blog_id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                                          <a href="{{url('/admin/add-keyword/' .$viewblog->blog_id)}}" class="btn btn-add btn-sm"><i class="fa fa-list"></i></a>
                                       </td>
                                    </tr>
                                   @endforeach 
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection