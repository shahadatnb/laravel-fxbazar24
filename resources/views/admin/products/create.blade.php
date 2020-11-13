@extends('layouts.master')
@section('title','Product')
@section('content')
<div class="content-wrapper">    
      {!! Form::open(['route'=>'products.store','method'=>'POST']) !!}
      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          @include('layouts._message')
          <div class="row">
            <div class="col-md-8">
              {{ Form::label('title','Title') }}
              {{ Form::text('title',null,['class'=>'form-control']) }} 
              @if($errors->has('title'))
                  <span class="help-block">{{ $errors->first('title') }}</span>
              @endif             
            </div>
            <div class="col-md-4">
              <br>
              {{ Form::submit('Next Step', ['class'=>'btn btn-primary btn-block']) }}             
            </div>
          </div>
        </div>
        <div class="card-body">          
          
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      {!! Form::close() !!}

    
    <!-- /.content -->
  </div>
 @endsection