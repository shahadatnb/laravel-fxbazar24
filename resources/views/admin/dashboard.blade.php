@extends('layouts.master')
@section('title','Admin Dashboard')
@section('content')
<div class="content-wrapper">   

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">Settings</h3>
        </div>
        <div class="card-body">
          @foreach($settings as $setting)
          {!! Form::open(['route'=>['saveSetting',$setting->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
          <div class="row">
            <div class="col-md-10">
              {{ Form::label($setting->name,$setting->description) }}
              {{ Form::text('value',$setting->value,['class'=>'form-control','required'=>'']) }} 
            </div>
            <div class="col-md-2"> <br>
            {{ Form::submit('Submit',array('class'=>'form-control btn btn-success')) }}</div>
          </div>
         {!! Form::close() !!}
         @endforeach
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection