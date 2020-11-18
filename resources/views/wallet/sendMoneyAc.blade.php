 @include('layouts._message')
  <h3 class="title">Send Money Another Account</h3>
  {!! Form::open(['route'=>'sendMoneyAc','method'=>'POST','class'=>'form-horizontal']) !!}
  <div class="row form-group">
    <div class="col-md-2">
      {{ Form::label('username','Username') }}
    </div>
    <div class="col-md-4">
      {{ Form::text('username',null,['class'=>'form-control','required'=>'']) }} 
      {{ Form::hidden('wType',$wallet) }} 
    </div>
    <div class="col-md-2">
      {{ Form::label('payment','Amount') }}
    </div>
    <div class="col-md-4">
      {{ Form::text('payment',null,['class'=>'form-control','required'=>'']) }}
    </div>
  </div>
  <div class="row form-group">
    <div class="col-md-2">
      {{ Form::label('remark','Remark') }}
    </div>
    <div class="col-md-4">
      {{ Form::text('remark',null,['class'=>'form-control']) }}
    </div>
    <div class="col-md-6">
      {{ Form::submit('Transtfar',array('class'=>'form-control btn btn-primary')) }}
    </div>
  </div>
 {!! Form::close() !!}