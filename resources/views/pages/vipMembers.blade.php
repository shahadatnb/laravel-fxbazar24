@extends('layouts.master')
@section('title','VIP Members')
@section('content')
<div class="content-wrapper">
  <div class="card bg-primary text-white">
    <div class="card-header">
      <h3 class="card-title">VIP Members</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>SL</th>
          <th>Username</th>
          <th>Name</th>
        </tr>
        <tr>
          <td>0</td>
          <td>{{Auth::user()->username}}</td>
          <td>{{Auth::user()->name}}</td>
        </tr>
        @foreach($members as $key=>$item)
        <tr>
          <td>{{++$key}}</td>
          <td>{{$item->username}}</td>
          <td>{{$item->name}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
 @endsection