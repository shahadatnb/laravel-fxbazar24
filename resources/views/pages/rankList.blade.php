@extends('layouts.master')
@section('title','Rank')
@section('content')

<div class="row">
  <div class="card">
    <div class="card-header with-border">
      <h3 class="card-title">Rank List</h3>
    </div>
    <div class="card-body">
      <table class="table">
        <tr>
          <th>ID</th>
          <th>Left + Right</th>
          <th>Prize</th>
          <th>Rank Namr</th>
        </tr>
        @foreach($rankInfo as $key=>$item)
        <tr>
          <td>{{$key}}</td>
          <td>{{$item['point']}} + {{$item['point']}}</td>
          <td>{{$item['prize']}}</td>
          <td>{{$item['title']}}</td>
        </tr>
        @endforeach
      </table>
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