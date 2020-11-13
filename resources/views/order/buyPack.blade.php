@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Buy Pack</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buy Pack</li>
      </ol>
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @include('layouts._message')
     
      <div class="row">
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <div class="product">
            <h2>{{$product->product_name}}</h2>
            <img class="img-responsive" src="{{url('/public')}}/upload/product/{{$product->photo}}" alt="">
            <div class="footer" style="margin-top: 20px;">
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-success">Price : {{$product->price}}</button>
                </div>
              </div>
            </div>
            <div>{!! $product->description !!}</div>
          </div>          
        </div>
        <div class="col-lg-6 col-xs-12">
          <div class="card">
            <div class="card-header with-border">
              <h3 class="card-title">Filup your Information</h3>
            </div>
            <div class="card-body">
              {!! Form::open(['route'=>'buyPackSubmit','method'=>'POST']) !!}
              <div class="row">
                @include('auth.reg_field')
              </div>
              <div class="row">
                <div class="col-md-12">
                  {{ Form::hidden('product_id',$product->id) }}
                  {{ Form::label('kuriar','Kuriar Service Name') }}
                  {{ Form::text('kuriar',null,['class'=>'form-control','required'=>'']) }}
                </div>
                <div class="col-md-12">
                  {{ Form::label('address','Your Address') }}
                  {{ Form::text('address',null,['class'=>'form-control','required'=>'']) }}
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"> <br>
                {{ Form::submit('Submit',array('class'=>'form-control btn btn-success')) }}</div>
              </div>
             {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    
    <!-- /.content -->
  </div>
 @endsection
