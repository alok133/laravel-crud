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
                  <h1>Edit BlogSeo</h1>
                  <small>Edit BlogSeo</small>
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
                              <a class="btn btn-add " href="{{url('admin/view-blogseo')}}"> 
                              <i class="fa fa-eye"></i> View BlogSeo </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/admin/edit-blogseo/' .$seodetails->seo_id)}}" method="post" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group">
                                <label>Under Blog ID</label>
                                <select name="blog_id" id="blog_id" class="form-control">
                                <?php echo $blogidcategories_dropdown; ?>
                                 </select>
                              </div>
                               <div class="form-group">
                                 <label>Meta title</label>
                                 <input type="text" class="form-control" value="{{$seodetails->meta_title}}" required name="meta_title" id="meta_title">
                              </div>
                              <div class="form-group">
                                 <label>Meta Description</label>
                                 <textarea name="meta_description" id="meta_description" class="form-control">
                                   {{$seodetails->meta_description}}
                                 </textarea>
                              </div>
                               <div class="form-group">
                                 <label>Meta Keyword</label>
                                 <input type="text" class="form-control" value="{{$seodetails->meta_keyword}}" required name="meta_keyword" id="meta_keyword">
                              </div>
                             
                              <div class="reset-button">
                                
                                <input type="submit" class="btn btn-success" value="Edit blogseo">
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