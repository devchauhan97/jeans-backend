@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.Blogs') }} <small>{{ trans('labels.ListingAllblogs') }}...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li class="active">{{ trans('labels.Blogs') }}</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Info boxes --> 
  
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.ListingAllblogs') }} </h3>
            <div class="box-tools pull-right">
            	<a href="{{ URL::to('admin/addblogs')}}" type="button" class="btn btn-block btn-primary">{{ trans('labels.AddBlogs') }}</a>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          
            <div class="row">
              <div class="col-xs-12">
              		
				  @if (count($errors) > 0)
					  @if($errors->any())
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  {{$errors->first()}}
						</div>
					  @endif
				  @endif
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ trans('labels.ID') }}</th>
                      <th>{{ trans('labels.Image') }}</th>
                      <th>{{ trans('labels.Title') }}</th>
                      
                      <th>{{ trans('labels.AddedLastModifiedDate') }}</th>
                      <th></th>
                    </tr>
                  </thead>
                   <tbody>
                   @if(count($blogs)>0)
                    @foreach ($blogs as  $key=>$new)
                    	
                        <tr>
                            <td>{{ $new->blogs_id }}</td>
                            <td><img src="{{getFtpImage($new->image)}}" alt="" width=" 100px" height="100px"></td>
                            <td>
                            	<strong>{{ $new->title }}</strong>
                            </td>
                            
                            <td>
                             	<strong>{{ trans('labels.AddedDate') }}: </strong> {{ $new->created_at }}<br>
                           		<strong>{{ trans('labels.ModifiedDate') }}: </strong>{{ $new->updated_at }}
                            </td>
                           
                            <td>
                                <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="editblogs/{{ $new->blogs_id }}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                
                                <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteBlogsId" blogs_id="{{ $new->blogs_id }}"  class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                   @else
                   <tr>
                   		<td colspan="6">{{ trans('labels.NoRecordFound') }}.</td>
                   </tr>
                   @endif
                  </tbody>
                </table>
                <div class="col-xs-12 text-right">
                	{{$blogs->links('vendor.pagination.default')}}
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
    
    <!-- deleteblogsModal -->
	<div class="modal fade" id="deleteBlogsModal" tabindex="-1" role="dialog" aria-labelledby="deleteblogsModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteblogsModalLabel">{{ trans('labels.Deleteblogs') }}</h4>
		  </div>
		  {!! Form::open(array('url' =>'admin/deleteblogs', 'name'=>'deleteblogs', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
				  {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
				  {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'id')) !!}
		  <div class="modal-body">						
			  <p>{{ trans('labels.DeleteblogsText') }}</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
			<button type="submit" class="btn btn-primary" id="deleteblogs">{{ trans('labels.Delete') }}</button>
		  </div>
		  {!! Form::close() !!}
		</div>
	  </div>
	</div>
    <!-- /.row --> 
    
    <!-- Main row --> 
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
@endsection 