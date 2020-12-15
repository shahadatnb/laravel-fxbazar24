@extends('layouts.master')
@section('title','VIP')
@section('content')
<div class="content-wrapper">
  <div class="card bg-primary text-white">
    <div class="card-header">
      <h3 class="card-title">VIP List</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Requirement</th>
          <th>Prize</th>
          <th>Star</th>
        </tr>
        @foreach($rankInfo as $key=>$item)
        <tr>
          <td>{{++$key}}</td>
          <td>{{$item['point']}} - {{$item['req']}}</td>
          <td>{{$item['prize']}}</td>
          <td>{{$item['title']}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
 @endsection