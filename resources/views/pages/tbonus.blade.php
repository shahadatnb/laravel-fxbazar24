@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">T Bonus</li>
      </ol>
    

    <!-- Main content -->
    
      <!-- Small boxes (Stat box) -->
      @include('layouts._message')
      
      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">Your Refferal ID {{ Auth::user()->id }}</h3>

          <div class="card-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <p>Your T Bonus ${{ $balance }}</p>
          <table class="table table-bordered table-striped">
            <tr>
              <th>Detail</th>
              <th>Income</th>
              <th>Payment</th>
              <th>Date</th>
            </tr>
            @foreach ($transaction as $member)
            <tr>
              <td>{{ $member->remark }}</td>
              <td>{{ $member->receipt }}</td>
              <td>{{ $member->payment }}</td>
              <td>{{ $member->created_at->format('d M Y h:i:s A') }}</td>
            </tr>
            @endforeach
          </table>
          <div class="text-center">{{ $transaction->links() }}</div>
        </div>
      </div>

    
    <!-- /.content -->
  </div>
 @endsection
