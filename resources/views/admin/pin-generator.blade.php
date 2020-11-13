@extends('layouts.admin-master')
@section('content')
<div class="content-wrapper">   

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">User Pin <a href="{{ url('pingenarate')}}">Generate New Pin</a></h3>

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
              <th>Pin</th>
              <th>Used By</th>
            </tr>
            @foreach ($pin as $member)
            <tr>
              <td>{{ $member->pin }}</td>
              <td>@if($member->userInfo)
                {{ $member->userInfo->id }}
              @endif</td>
            </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $pin->links() }}</div>
        <!-- /.box-body -->
        <div class="card-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection