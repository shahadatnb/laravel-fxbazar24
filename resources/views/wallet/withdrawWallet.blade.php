@extends('layouts.master')
@section('title',$walletName)
@section('content')
<div class="content-wrapper">
      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-info with-border">
          <strong class="card-title text-light">Your {{$walletName}} Balance <i class="fa fa-dollar"></i>{{ $balance }}</strong>
        </div>
        <div class="card-body">
          <p>Transaction List</p>
          <table class="table">
            <tr>
              <th>Remark</th>
              <th>Receipt</th>
              <th>Withdraw</th>
              <th>Date</th>
              <th>#</th>
            </tr>
            @foreach ($transaction as $item)
            <tr>
              <td>{{ $item->remark }}</td>
              <td>{{ $item->receipt }}</td>
              <td>{{ $item->payment }}</td>
              <td>{{ $item->created_at->format('d M Y h:i:s A') }}</td>
              <td>
                @if($item->adminWid != null)
                 @if($item->adminWattet->confirm ==1)
                    <span class="badge badge-success">Success</span> 
                  @else
                    <span class="badge badge-warning">Pending</span>                      
                  @endif
                @endif
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
        @php
          $accounts = [
            'bKash'=>'bKash',
            'Rocket'=>'Rocket',
            'Others'=>'Others'
          ];
        @endphp
      </div>
      <!-- /.box -->
      <div class="card">
        <div class="card-header bg-info">
          <strong class=" text-light">Withdraw balance</strong>
        </div>
        <div class="card-body card-block">
          @include('layouts._message')
          {!! Form::open(['route'=>'withdrawBalance','method'=>'POST','class'=>'form-horizontal']) !!}
             <div class="row form-group">
              <div class="col-3">{{ Form::label('payment','Amount') }}</div>
              <div class="col-9">{{ Form::text('payment',null,['class'=>'form-control','required'=>'']) }}</div>                              
            </div>
            <div class="row form-group">
              <div class="col-3">{{ Form::label('bankName','Bank Name') }}</div>
              <div class="col-9">{{ Form::select('bankName',$accounts,null,['class'=>'form-control','required'=>'','placeholder'=>'Bank Name']) }}</div>                
            </div>
            <div class="row form-group">
              <div class="col-3">{{ Form::label('accountNo','Account No') }}</div>
              <div class="col-9">{{ Form::text('accountNo',null,['class'=>'form-control','required'=>'']) }}</div>              
            </div>
            <div class="row form-group">
              <div class="col-3">{{ Form::label('remark','Remark') }}</div>
              <div class="col-9">{{ Form::text('remark',null,['class'=>'form-control','required'=>'']) }}</div>              
            </div>
            <div class="row form-group">
              {{ Form::submit('Send',array('class'=>'form-control btn btn-primary')) }}
            </div>

          {!! Form::close() !!} 
        </div>
    </div>
    <!-- /.content -->
  </div>
 @endsection