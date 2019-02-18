@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.EditBlogs') }} <small>{{ trans('labels.EditBlogs') }}...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="{{ URL::to('admin/blogs')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.ListingAllBlogs') }}</a></li>
      <li class="active">{{ trans('labels.EditBlogs') }}</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Info boxes --> 
    
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.EditBlogs') }} </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              		<div class="box box-info">
                        <!--<div class="box-header with-border">
                          <h3 class="box-title">Edit News</h3>
                        </div>-->
                        <!-- /.box-header -->
                        <!-- form start -->                        
                         <div class="box-body">
                          @if( count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-success" role="alert">
                                      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                      <span class="sr-only">{{ trans('labels.Error') }}:</span>
                                      {{ $error }}
                                </div>
                             @endforeach
                          @endif
                        
                            {!! Form::open(array('url' =>'admin/updateblogs', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                            	
                            	{!! Form::hidden('id',  $result['blogs']->blogs_id, array('class'=>'form-control', 'id'=>'id')) !!}
                               <div class="form-group">
                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.BlogTitle') }} </label>
                                <div class="col-sm-10 col-md-4">
                                  {!! Form::text('title',   $result['blogs']->title, array('class'=>'form-control field-validate', 'id'=>'title')) !!}
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.SortDescription') }} </label>
                                <div class="col-sm-10 col-md-4">
                                  {!! Form::text('sort_description', $result['blogs']->sort_description, array('class'=>'form-control field-validate', 'id'=>'sort_description')) !!}
                                </div>
                              </div>
                                <div class="form-group">
                                	<label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Description') }}  </label>
                                    <div class="col-sm-10 col-md-8">
                                        <textarea id="editor" name="description" class="form-control"  rows="10" cols="80">{{ stripslashes($result['description']) }}</textarea>
                                    
                                    </div>
                                </div>
                                 
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::file('blogs_image', array('id'=>'blogs_image')) !!}<br>
                                    {!! Form::hidden('oldImage',  $result['blogs']->image , array('id'=>'oldImage')) !!}
                                    <img src="{{getFtpImage($result['blogs']->image)}}" alt="" width=" 100px">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.UploadImageforBlogs') }}</span>
                                  </div>
                                </div>
                                 
                                                               
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Status') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="status">
                                          <option value="1" @if($result['blogs']->status==1) selected @endif >{{ trans('labels.Active') }}</option>
                                          <option value="0" @if($result['blogs']->status==0) selected @endif>{{ trans('labels.Inactive') }}</option>
                                      </select>
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Active status will be displayed on user side.</span>
                                  </div>
                                </div>
                              <!-- /.box-body -->
                              <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ trans('labels.Update') }}</button>
                                <a href="{{ URL::to('admin/blogs')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                              </div>
                              
                              <!-- /.box-footer -->
                            {!! Form::close() !!}
                        </div>
                  </div>
              </div>
            </div>
            
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    
    <!-- Main row --> 
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
<script src="{!! asset('admin/plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
<script type="text/javascript">
		$(function () {
			
			//for multiple languages
			 	// Replace the <textarea id="editor1"> with a CKEditor
				// instance, using default configuration.
				CKEDITOR.replace('editor');
			
		 
			//bootstrap WYSIHTML5 - text editor
			$(".textarea").wysihtml5();
			
    });
</script>
@endsection 