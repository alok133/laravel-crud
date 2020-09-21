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
                  <h1>Add Blog</h1>
                  <small>Add Blog</small>
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
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="{{url('admin/view-blogs')}}"> 
                              <i class="fa fa-eye"></i> View Blogs </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/add-blog')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              
                               <div class="form-group">
                                 <label>Under Category</label>
                                 <select name="blogcategoryid" id="blogcategoryid" class="form-control">
                                   <?php echo $categories_dropdown; ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" placeholder="Enter name" required name="blog_name" id="blog_name">
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <textarea name="blog_description" id="blog_description" class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                 <label>Banner Image</label>
                                 <input type="file" name="banner_image" id="banner_image">
                                
                              </div>

                              <div class="form-group">
                                 <label>Main Image</label>
                                 <input type="file" name="main_image" id="main_image">
                                
                              </div>
                              
                              <div class="reset-button">
                                
                                <input type="submit" class="btn btn-success" value="add blog">
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
@endsection