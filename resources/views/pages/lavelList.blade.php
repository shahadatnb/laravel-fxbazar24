@extends('layouts.master')
@section('title','User list')
@section('stylesheet')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Level List</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Level List</li>
      </ol>
    

    <!-- Main content -->
    

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          
          <table class="table table-bordered table-striped">
            <tr>
              <th>Your Level</th>
              <th>Your Member</th>
            </tr>
            @foreach($datas as $key=>$data)
            <tr>
              <td>Level-{{$key}}</td>
              <td>{{$data}}</td>
            </tr>
            @endforeach
          </table>
          
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection