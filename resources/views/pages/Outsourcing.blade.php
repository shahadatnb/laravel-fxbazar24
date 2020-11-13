@extends('layouts.master')
@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    
      <!-- Small boxes (Stat box) -->
      @include('layouts._message')
      @if($data != null)
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Message:</strong> {{ $data['outsourcing_msg'] }}
            </div>
        </div>
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Affiliate</h3>

              <p>Click More info</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="{{ $data['affiliate'] }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Data Entry</h3>

              <p>Click More info</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="{{ $data['data_entry'] }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Others</h3>

              <p>Click More info</p>
            </div>
            <div class="icon">
              <i class="fa fa-dollar"></i>
            </div>
            <a href="{{ $data['out_others'] }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      @else
      <div class="row">
        <div class="col-md-10"><h2>{!! $msg !!}</h2></div>
      </div>
      @endif
    
    <!-- /.content -->
  </div>
 @endsection
