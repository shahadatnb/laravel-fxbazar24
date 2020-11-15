@extends('layouts.master')
@section('title','My Sponsored Records')
@section('stylesheet')
@endsection
@section('content')
<div class="content-wrapper">   

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          
          <table class="table table-dark">
            <tr>
              <th>SL</th>
              <th>Username</th>
              <th>Name</th>
              <th>Mobile</th>
            </tr>
            @foreach($members as $key=>$data)
            <tr>
              <td>{{++$key}}</td>
              <td>{{$data->username}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->mobile}}</td>
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