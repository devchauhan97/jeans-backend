@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.EditSectionImage') }} <small>{{ trans('labels.EditSectionImage') }}...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="{{ URL::to('admin/sections')}}"><i class="fa fa-bars"></i> {{ trans('labels.sections') }}</a></li>
      <li class="active">{{ trans('labels.EditSectionImage') }}</li>
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
            <h3 class="box-title">{{ trans('labels.EditSectionImage') }} </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              		<div class="box box-info">
                    <br>                       
                        @if (count($errors) > 0)
                              @if($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  {{$errors->first()}}
                                </div>
                              @endif
                          @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success')}}
                            </div>
                        @endif
                        <!--<div class="box-header with-border">
                          <h3 class="box-title">Edit category</h3>
                        </div>-->
                        <!-- /.box-header -->
                        <!-- form start -->                        
                         <div class="box-body">
                         
                            {!! Form::open(array('url' =>'admin/update/section', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                              
                              {!! Form::hidden('id',  $result['sections'][0]->sections_id , array('class'=>'form-control', 'id'=>'id')) !!}
                              {!! Form::hidden('oldImage',  $result['sections'][0]->sections_image, array('id'=>'oldImage')) !!}
                                <input type="hidden" name="languages_id" value="1">
                               <!--  <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Language') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="languages_id">
                                          @foreach($result['languages'] as $language)
                                              <option value="{{$language->languages_id}}" @if($language->languages_id==$result['sections'][0]->languages_id) selected @endif>{{ $language->name }}</option>
                                          @endforeach
                                      </select>
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      {{ trans('labels.ChooseLanguageText') }}</span>
                                  </div>
                                </div> -->
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Title') }} </label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('sections_title', $result['sections'][0]->sections_title, array('class'=>'form-control','id'=>'sections_title')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.SliderTitletext') }}</span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Position') }} </label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::select('position', array('top'=>'Top','center'=>'Center','bottom'=>'bottom'),$result['sections'][0]->position, array('class'=>'form-control field-validate','id'=>'position')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.PositionTitletext') }}</span>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Categories') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="type" id="bannerType">
                                          <option value="category" @if($result['sections'][0]->type=='category') selected @endif>
                                          {{ trans('labels.ChooseSubCategory') }}</option>
                                          <option value="product" @if($result['sections'][0]->type=='product') selected @endif>{{ trans('labels.Product') }}</option>
                                                
                                      </select>
                                       <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      {{ trans('labels.ChooseSliderToAsscociateWith') }}</span>
                                  </div>
                                </div>
                                
                                <!--<div class="form-group slider-link">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Banners Link </label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('sections_url', '', array('class'=>'form-control','id'=>'sections_url')) !!}
                                  </div>
                                </div>-->
                                
                                <div class="form-group categoryContent" @if($result['sections'][0]->type!='category') style="display: none" @endif >
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Categories') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="categories_id" id="categories_id">
                                      @foreach($result['categories'] as $category)
                                		<option value="{{ $category->slug}}">{{ $category->name}}</option>
                                      @endforeach
                                      </select>
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      {{ trans('labels.CategoriessliderText') }}</span>
                                  </div>
                                </div>
                                
                                <div class="form-group productContent" @if($result['sections'][0]->type!='product') style="display: none" @endif>
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Products') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="products_id" id="products_id">
                                      @foreach($result['products'] as $products_data)
                                		<option value="{{ $products_data->products_slug }}">{{ $products_data->products_name }}</option>
                                      @endforeach
                                      </select>
                                     <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      {{ trans('labels.ProductsSliderText') }}</span>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::file('newImage', array('id'=>'image')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ImageSliderText') }}</span>
                                    <br>
                			
                                    <img src="{{getFtpImage($result['sections'][0]->sections_image)}}" alt="" width=" 100px">
                                  </div>
                                </div>
                                
                                <!--<div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">Banners URL </label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('sections_url', $result['sections'][0]->sections_url, array('class'=>'form-control','id'=>'sections_url')) !!}
                                    
                                  </div>
                                </div>-->
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ExpiryDate') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                  
                                 
                                  
                                   @if(!empty($result['sections'][0]->expires_date))
                                    {!! Form::text('expires_date', date('d/m/Y', strtotime($result['sections'][0]->expires_date)), array('class'=>'form-control datepicker', 'id'=>'expires_date')) !!}
                                   @else
                                    {!! Form::text('expires_date', '', array('class'=>'form-control datepicker', 'id'=>'expires_date')) !!}
                                    
                                   @endif
                                   <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                    {{ trans('labels.ExpiryDateSlider') }}</span>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Status') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="status">
                                          <option value="1" @if($result['sections'][0]->status==1) selected @endif>{{ trans('labels.Active') }}</option>
                                          <option value="0" @if($result['sections'][0]->status==0) selected @endif>{{ trans('labels.Inactive') }}</option>
                                      </select>
                                     <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      {{ trans('labels.StatusSliderText') }}</span>
                                  </div>
                                </div>
                                
                                
                              <!-- /.box-body -->
                              <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ trans('labels.Update') }}</button>
                                <a href="{{ URL::to('admin/section')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
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