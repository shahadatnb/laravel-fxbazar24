 @include('layouts._message')
  <h3 class="card-title">Send To Withdraw wallet</h3>
  {!! Form::open(['route'=>'sendMoneyWw','method'=>'POST']) !!}
    {{ Form::hidden('wType',$wallet) }} 
  <div class="row">
  <div class="col-md-4">
    {{ Form::label('payment','Amount') }}
    {{ Form::text('payment',null,['class'=>'form-control','required'=>'']) }}
  </div>
  <div class="col-md-4">
      {{ Form::label('remark','Remark') }}
      {{ Form::text('remark',null,['class'=>'form-control']) }}
    </div>
    <div class="col-md-2"> <br>
    {{ Form::submit('Send',array('class'=>'form-control btn btn-success')) }}</div>
  </div>
 {!! Form::close() !!}