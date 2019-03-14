  @extends('admin.layout')
  @section('content')
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> {{ trans('labels.SpotLightProduct') }} <small>{{ trans('labels.SpotLightProduct') }}...</small> </h1>
      <ol class="breadcrumb">
         <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
        <li><a href="{{ URL::to('admin/coupons')}}"><i class="fa fa-dashboard"></i>All Coupons</a></li>
        <li class="active">{{ trans('labels.SpotLightProduct') }}</li>
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
              <h3 class="box-title">{{ trans('labels.SpotLightProduct') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12">              		
      				  @if (count($errors) > 0)
      					  @if($errors->any())
      						<div class="alert alert-danger alert-dismissible" role="alert">
      						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      						  {{$errors->first()}}
      						</div>
      					  @endif
      				  @endif
                @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible" role="alert">
      						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              			{!! session('success') !!}
      						</div>
                @endif
                </div>
              </div>
                
              <div class="row">
                <div class="col-xs-12">
              	  <div class="box box-info"><br>
                    <div class="box-body">
                    {!! Form::open(array('url' =>'admin/update/spotlightproduct', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                     <div class="form-group">
      								<label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Products') }}</label>
      								<div class="col-sm-10 col-md-4 couponProdcuts">
      									<select name="product_ids[]" multiple class="form-control select2">
                        	@foreach($result['products'] as $products)
                           	 <option value="{{ $products->products_id }}" @if(in_array($products->products_id,   $result['spotlightproduct'])) selected @endif>{{ $products->products_name }} {{ $products->products_model }}</option>
                            @endforeach
                        </select>
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.SpotLightProductSelected') }}</span>
      								</div>
      							</div>
                 		<div class="box-footer text-center">
      								<button type="submit" class="btn btn-primary">{{ trans('labels.Update') }}</button>
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