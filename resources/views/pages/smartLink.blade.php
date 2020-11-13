@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{$title}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$title}}</li>
      </ol>
    

    <!-- Main content -->
    
      <!-- Small boxes (Stat box) -->
      @include('layouts._message')
      
      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">{{$title}}</h3>

          <div class="card-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          @foreach ($slink as $member)
          <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ $member->remark }}
          </div>
            <p>{{ $member->link }}</p>
            @endforeach
        </div>
      </div>

    
    <!-- /.content -->
  </div>
 @endsection
