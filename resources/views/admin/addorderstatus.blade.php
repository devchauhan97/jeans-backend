@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.AddOrderStatus') }} <small>{{ trans('labels.AddOrderStatus') }}...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="{{ URL::to('admin/orderstatus')}}"><i class="fa fa-dashboard"></i>{{ trans('labels.ListingOrderStatus') }}</a></li>
      <li class="active">{{ trans('labels.AddOrderStatus') }}</li>
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
            <h3 class="box-title">{{ trans('labels.AddOrderStatus') }}</h3>
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
              	  <div class="box box-info">
                        <!-- form start -->                        
                         <div class="box-body">
                         
                            {!! Form::open(array('url' =>'admin/add/order/status', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                            <input type="hidden" name="language_id" value="1">
                            <!-- <div class="form-group">
              								<label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Language') }}</label>
              								<div class="col-sm-10 col-md-4">
                                    <select name="language_id" class="form-control">
                                    	@foreach($result['languages'] as $languages)
                                        	<option value="{{ $languages->languages_id }}">{{ $languages->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                    {{ trans('labels.StatusLanguageText') }}</span>
                							</div>
                						</div> -->
                            
                            <div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Set Default') }}</label>
								<div class="col-sm-10 col-md-4">
                                    <select name="public_flag" class="form-control">
                                        	<option value="0">{{ trans('labels.No') }}</option>
                                        	<option value="1">{{ trans('labels.Yes') }}</option>
                                    </select>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                    {{ trans('labels.StatusLanguageText') }}</span>
								</div>
							</div>
							
							<div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.OrdersStatus') }}</label>
								<div class="col-sm-10 col-md-4">
									{!! Form::text('orders_status_name',  '', array('class'=>'form-control field-validate', 'id'=>'orders_status_name'))!!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                    {{ trans('labels.OrdersStatusMessage') }}</span>
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
								</div>
							</div>							
							<!-- /.box-body -->
							<div class="box-footer text-right">
                            	<div class="col-sm-offset-2 col-md-offset-3 col-sm-10 col-md-4">
                                    <button type="submit" class="btn btn-primary">{{ trans('labels.AddStatus') }}</button>
                                    <a href="orderstatus" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                                </div>
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
@endsection 