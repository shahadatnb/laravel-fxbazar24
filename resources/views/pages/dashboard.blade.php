@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="row">
  @foreach($wallets as $item)
  <div class="col-lg-3 col-md-6">
      <div class="card">
          <div class="card-body">
              <div class="stat-widget-five">
                  <div class="stat-icon dib flat-color-1">
                      <i class="pe-7s-cash"></i>
                  </div>
                  <div class="stat-content">
                      <div class="text-left dib">
                          <div class="stat-text">$<span class="count">{{$item['balance']}}</span></div>
                          <div class="stat-heading">{{$item['title']}}</div>
                      </div>
                  </div>
              </div>
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