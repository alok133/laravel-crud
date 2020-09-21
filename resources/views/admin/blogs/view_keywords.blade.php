@extends('admin.layouts.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-list"></i>
               </div>
               <div class="header-title">
                  <h1>View Keywords</h1>
                  <small>Keywords List</small>
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
                           
                        </div>
                        <div class="panel-body">
                        <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                           <div class="btn-group">
                              <div class="buttonexport" id="buttonlist"> 
                                 <a class="btn btn-add" href="{{url('admin/view-blogs')}}"> <i class="fa fa-plus"></i> View Blogs
                                 </a>  
                              </div>
                              
                           </div>
                          
                           <div class="table-responsive">
                              <table id="table_id" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Keyword ID</th>
                                       <th>Blog ID</th>
                                       <th>Keyword Name</th>
                                       <th>status</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 	@foreach($viewkeywords as $viewkeyword)
                                    <tr>
                                       <td>{{$viewkeyword->keyword_id}}</td>
                                       <td>{{$viewkeyword->blog_id}}</td>
                                       <td>{{$viewkeyword->keyword_name}}</td>
                                       <td>
                                          <input type="checkbox" class="keywordstatus btn btn-success" rel="{{$viewkeyword->keyword_id}}" data-toggle="toggle" data-on="Enabled" data-off="disabled" data-onstyle="success" data-offstyle="danger" @if($viewkeyword['status']=="1") checked @endif>
                                          <div id="myElem" style="display: none;" class="alert alert-success">Status Enabled</div>
                                       </td>
                                       <td>
                                          <a href="{{url('/admin/edit-keyword/' .$viewkeyword->keyword_id)}}" class="btn btn-add btn-sm"><i class="fa fa-pencil"></i></a>
                                          <a href="{{url('/admin/delete-keyword/' .$viewkeyword->keyword_id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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