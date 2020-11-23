@extends('layouts.master')
@section('title','Generation Chart')
@section('stylesheet')
@endsection
@section('content')
<div class="content-wrapper">   

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          
          <table class="table table-bordered table-striped">
            <tr>
              <th>Level</th>
              <th>Refferal Member</th>
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