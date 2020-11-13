@extends('layouts.master')
@section('title','Product')
@section('stylesheet')
  {!! Html::style('public/admin/vendor/summernote/summernote.min.css') !!}
  <style>
    img{max-width: 100%}
    #image_row label {position: absolute;}
  </style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active">Detail</li>
      </ol>
    

    <!-- Main content -->
    
      {!! Form::model($product,['route'=>['products.update',$product->id],'method'=>'PUT', 'files' => true ]) !!}
      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          @include('layouts._message')
          <div class="row">
            <div class="col-md-12">
              {{ Form::label('title','Title') }}
              {{ Form::text('title',null,['class'=>'form-control']) }} 
              @if($errors->has('title'))
                  <span class="help-block">{{ $errors->first('title') }}</span>
              @endif             
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              {{ Form::label('price','Price') }}
              {{ Form::text('price',null,['class'=>'form-control']) }} 
              @if($errors->has('price'))
                  <span class="help-block">{{ $errors->first('price') }}</span>
              @endif 
            </div>
            <div class="col-md-6">
              {{ Form::label('cat_id','Product Category') }}
              {{ Form::select('cat_id',$cats,null,['class'=>'form-control','placeholder'=>'Product Category']) }} 
              @if($errors->has('cat_id'))
                  <span class="help-block">{{ $errors->first('cat_id') }}</span>
              @endif 
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              {{ Form::label('description','Description') }}
              {{ Form::textarea('description',null,['class'=>'form-control textarea']) }}
              @if($errors->has('description'))
                  <span class="help-block">{{ $errors->first('description') }}</span>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              {{ Form::label('photo','Photo') }}
              {{ Form::file('photo',null,array('class'=>'form-control','maxlenth'=>'255')) }}
              @if($errors->has('photo'))
                  <span class="help-block">{{ $errors->first('photo') }}</span>
              @endif 
            </div>

            <div class="col-md-6">
              {{ Form::submit('Update', ['class'=>'btn btn-success btn-block']) }}
            </div>
          </div>
        </div>
        <div class="card-body">          
              <img style="max-width: 200px" src="{{url('/public')}}/upload/product/{{$product->photo}}" alt="">
        {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      

    
    <!-- /.content -->
  </div>
 @endsection
    @section('scripts')
    {!! Html::script('public/admin/vendor/summernote/summernote.min.js') !!}
      <script>
        $('.textarea').summernote();
      </script>
    @endsection