@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>  </h1>
    <ol class="breadcrumb">
        
    </ol>
  </section>
  <!-- Main content -->
      <section class="content"> 
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Oops!</h1>
                    <h2>
                        404 Not Found</h2>
                    <div class="error-details">

                        @if(@$errors->any())
                          <h4>{{@$errors->first()}}</h4>
                        @else
                        Sorry, an error has occured, Requested page not found!
                        @endif
                    </div>
                     
                </div>
            </div>
        </div>
    </section>
</div>
 
@endsection