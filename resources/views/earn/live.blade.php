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
        <div class="card-body text-center games" style="background: rgba(0, 0, 0, 0) url('{{url('/')}}/public/images/earn-bg.jpg') repeat scroll 0 0 / cover; height: 600px">
          <div><a href="#" class="btn btn-danger btn-lg btn-earn">Live</a></div>
           @include('layouts._message')
          <h1 class="text-left heading">{!! $msg !!}</h1>
          
          @if($bett != null)
            <div class="games-panel">
              <h3><span class="label label-primary">{{ $bett->description }} {{ $bett->teamA }} VS {{ $bett->teamB }}</span></h3>
              <h3><span class="label label-info">Last time {{ date('d-m-Y h:i:s A', strtotime($bett->lastTime)) }}</span></h3>
              <a href="{{ route('liveWin',[$bett->id,$bett->teamA]) }}" class="btn btn-success btn-lg">Win {{ $bett->teamA }}?</a> | 
              <a href="{{ route('liveWin',[$bett->id,$bett->teamB]) }}" class="btn btn-success btn-lg">Win {{ $bett->teamB }}?</a> | 
              <a href="{{ route('liveWin',[$bett->id,$bett->draw]) }}" class="btn btn-success btn-lg">{{ $bett->draw }} ?</a>
            </div>
          @endif
          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection

@section('scripts')
{!! Html::script('public/admin/plugins/jquery.countdown-2.2.0/jquery.countdown.min.js') !!}
  <script>
    function confirmSubmit() {
      var msg;
      msg= "Are you sure? Cost $15";
      var agree=confirm(msg);
      if (agree)
      return true ;
      else
      return false ;
    }
  </script>
@endsection