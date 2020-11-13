@extends('layouts.master')
@section('title','Youtube')
@section('content')
<div class="content-wrapper"> 
      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">Youtube</h3>
        </div>
        <div class="card-body">
          {!! Form::open(['route'=>'youtubeLinks.store','method'=>'POST','class'=>'form-horizontal']) !!}
          <div class="row">
            <div class="col-md-3">
              {{ Form::label('publish_date','Publish Date') }}
              {{ Form::text('publish_date',\Carbon\Carbon::now('Asia/Dhaka')->addDay(1)->format('Y-m-d'),['class'=>'form-control','required'=>'']) }} 
            </div>
            <div class="col-md-7">
              {{ Form::label('link','Link') }}
              {{ Form::text('link',null,['class'=>'form-control','required'=>'']) }} 
            </div>
            <div class="col-md-2"> <br>
            {{ Form::submit('Submit',array('class'=>'form-control btn btn-success')) }}</div>
          </div>
         {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          <table class="table">
            <tr>
              <th>ID</th>
              <th>Date</th>
              <th>Link</th>
              <th>#</th>
            </tr>
            @foreach($ptcs as $ptc)
            <tr>
              <td>{{$ptc->id}}</td>
              <td>{{$ptc->publish_date}}</td>
              <td><a target="_blank" href="{{$ptc->link}}">{{$ptc->link}}</a></td>
              </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $ptcs->links() }}</div> 
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection