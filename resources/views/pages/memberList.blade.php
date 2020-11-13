@extends('layouts.master')
@section('title','Member list')
@section('content')
<div class="content-wrapper">   

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          
          <table class="table table-bordered table-striped">
            <tr>
              <th>User ID</th>
              <th>Name</th>
              <th>Joining Date</th>
              <th>Details</th>
            </tr>
            @foreach($members as $data)
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{prettyDate($data->created_at)}}</td>
              <td><a href="{{url('/member/id',$data->id)}}" class="btn btn-primary btn-xs">Click</a></td>
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