@extends('layouts.master')
@section('content')
<div class="content-wrapper">   
    <div class="card">
      <div class="card-header bg-success with-border">
        <strong class="card-title text-light">Filup your Information</strong>
      </div>
      <div class="card-body">
      @include('layouts._message')
        {!! Form::open(['route'=>'newMember','method'=>'POST']) !!}
        <div class="row">
          @include('auth.reg_field')
          <input type="hidden" name="referralId" value="{{ Auth::user()->id }}" required>
        </div>
        <div class="row">
          <div class="col-md-12"> <br>
          {{ Form::submit('Submit',array('class'=>'form-control btn btn-success')) }}</div>
        </div>
       {!! Form::close() !!}
      </div>
    </div>
    
    <!-- /.content -->
  </div>
 @endsection
