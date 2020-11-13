@extends('layouts.master')
@section('title','Profile')
@section('content')
<div class="content-wrapper">
     <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">Update Your Profile</h3>
        </div>
        <div class="card-body">
          {!! Form::model($user,['url' => ['updateProfile'],'method'=>'POST','class'=>'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Full Name</label>

                <div class="col-md-6">
                    {{ Form::text('name',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="col-md-4 control-label">Username</label>

                <div class="col-md-6">
                    {{ Form::text('username',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    {{ Form::text('email',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

<!--             <div class="form-group{{-- $errors->has('skypeid') ? ' has-error' : '' --}}">
    <label for="skypeid" class="col-md-4 control-label">Skype ID</label>

    <div class="col-md-6">
        {{-- Form::text('skypeid',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) --}}

        @if ($errors->has('skypeid'))
            <span class="help-block">
                <strong>{{-- $errors->first('skypeid') --}}</strong>
            </span>
        @endif
    </div>
</div> -->

            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                <label for="mobile" class="col-md-4 control-label">Mobile</label>

                <div class="col-md-6">
                    {{ Form::text('mobile',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}

                    @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update Profile
                    </button>
                </div>
            </div>
          {!! Form::close() !!}
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

@section('scripts')
  <script>
    function confirmSubmit() {
      var msg;
      msg= "Are you sure? Cost $15";
      var agree=confirm(msg);
      if (agree)
      return true ;
      else
      return false ;
    }
  </script>
@endsection