@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="card">
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
</div>
 @endsection
 {{-- 
<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$key}}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <i class="fas fa-dollar-sign"></i> {{ $balance }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div> --}}