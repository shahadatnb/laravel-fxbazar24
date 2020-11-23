@extends('layouts.master')
@section('title','Matching List')
@section('content')
<div class="content-wrapper">
  <div class="card bg-primary text-white">
    <div class="card-header">
      <h3 class="card-title">Matching List</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Left + Right</th>
          <th>Prize</th>
        </tr>
        @foreach($rankInfo as $key=>$item)
        <tr>
          <td>{{++$key}}</td>
          <td>{{$item}} + {{$item}}</td>
          <td>{{$item*.05}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
 @endsection