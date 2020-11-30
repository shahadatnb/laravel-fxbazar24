@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col">
    <div class="alert alert-info" role="alert">
      <marquee behavior="" direction="">{{ settingValue('backend_msg') }}</marquee>   
    </div>    
  </div>
</div>
<div class="row">
@foreach($wallets2 as $item)
  <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-{{$item['bg']}}">
          <div class="card-body">
              <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                  {{$item['balance']}}                      
                      {{-- <span class="count"></span> --}}
                  </h3>
                  <p class="text-light mt-1 m-0">{{$item['title']}}</p>
              </div><!-- /.card-left -->

              <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-cash"></i>
              </div><!-- /.card-right -->

          </div>

      </div>
  </div>  
  @endforeach
  @foreach($wallets as $item)
  <div class="col-sm-6 col-lg-3">
      <div class="card text-white bg-flat-color-{{$item['bg']}}">
          <div class="card-body">
              <div class="card-left pt-1 float-left">
                  <h3 class="mb-0 fw-r">
                      <span class="currency float-left mr-1">$</span>
                      {{$item['balance']}}
                      {{-- <span class="count">23569</span> --}}
                  </h3>
                  <p class="text-light mt-1 m-0">{{$item['title']}}</p>
              </div><!-- /.card-left -->

              <div class="card-right float-right text-right">
                  <i class="icon fade-5 icon-lg pe-7s-cash"></i>
              </div><!-- /.card-right -->

          </div>

      </div>
  </div>
  @endforeach
</div>
{{-- <div class="card">
  <div class="card-header">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
  </div>
  <div class="card-body">
    <div class="row">
    	@foreach($wallets as $item)
      <div class="col-sm-6 col-lg-3 mb-4">
        <div class="card bg-{{$item['bg']}} text-white shadow">
          <div class="card-body text-center">
            {{$item['title']}}
            <div class="text-white"><i class="fa fa-dollar"></i>{{$item['balance']}}</div>
          </div>
        </div>
      </div>
    	@endforeach
    </div>
  </div>
</div> --}}
 @endsection