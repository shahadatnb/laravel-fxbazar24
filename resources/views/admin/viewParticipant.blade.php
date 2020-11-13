@extends('layouts.admin-master')
@section('title','Admin Dashboard')
@section('content')
<div class="content-wrapper">
      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title"></h3>

          <div class="card-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <table class="table">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Balance</th>
                <th>Ans</th>
                <th>Ans Time</th>
              </tr>
              @foreach ($games as $data)
              <tr>
                <td>{{ $data->user_id }}</td>
                <td>{{ $data->userInfo->name }}</td>
                <td>${{ $data->gameBalance($data->user_id) }}</td>
                <td>{{ $data->ans }}</td>
                <td>{{ $data->created_at->format('d M Y h:i:s A') }}</td>
              </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection