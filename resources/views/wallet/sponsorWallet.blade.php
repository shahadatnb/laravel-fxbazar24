@extends('layouts.master')
@section('title',$walletName)
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-success with-border">
          <strong class="card-title text-light">Your {{$walletName}} Balance <i class="fa fa-dollar"></i>{{ $balance }}</strong>
        </div>
        <div class="card-body">
          <p>Transaction List</p>
          <table class="table">
            <tr>
              <th>Remark</th>
              <th>Receipt</th>
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
        </div>
        <!-- /.box-body -->
{{--         <div class="card-footer">
           @include('layouts._message')
          <h3 class="card-title">Send Money Another Account</h3>
          {!! Form::open(['route'=>'sendMoneyAc','method'=>'POST']) !!}
          <div class="row">
            <div class="col-md-4">
            {{ Form::label('user_id','User Id') }}
            {{ Form::text('user_id',null,['class'=>'form-control','required'=>'']) }} 
          </div>
            <div class="col-md-4">
            {{ Form::label('payment','Amount') }}
            {{ Form::text('payment',null,['class'=>'form-control','required'=>'']) }}
          </div>
            <div class="col-md-4"> <br>
            {{ Form::submit('Send',array('class'=>'form-control btn btn-success')) }}</div>
          </div>
         {!! Form::close() !!}


        </div> --}}
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    
    <!-- /.content -->
  </div>
 @endsection