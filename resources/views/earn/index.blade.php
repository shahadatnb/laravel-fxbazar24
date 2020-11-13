@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Earn Zone</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Home</li>
      </ol>
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border earn">
          <marquee behavior="" direction="">{{ App\Setting::settingValue('live_bett_msg') }}</marquee>
        </div>
        <div class="card-body" style="background: rgba(0, 0, 0, 0) url('{{url('/')}}/public/images/earn-bg.jpg') repeat scroll 0 0 / cover; height: 600px">
          <a href="{{url('live')}}" class="btn btn-danger btn-lg btn-earn">Live</a>
          <a href="{{url('live2')}}" class="btn btn-danger btn-lg btn-earn">Live2</a>
          <a href="#" class="btn btn-danger btn-lg btn-earn">Runner</a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection