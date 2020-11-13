@extends('layouts.master')
@section('title','Profile')
@section('content')
<div class="content-wrapper">
      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title">Enter current password and new password</h3>
        </div>
        <div class="card-body">
          {!! Form::open(['url' => 'changePass','class'=>'form-horizontal']) !!}
            <div class="form-group{{ $errors->has('CurrentPassword') ? ' has-error' : '' }}">
                <label for="CurrentPassword" class="col-md-4 control-label">Current Password</label>

                <div class="col-md-6">
                    <input id="CurrentPassword" type="password" class="form-control" name="CurrentPassword" required>

                    @if ($errors->has('CurrentPassword'))
                        <span class="help-block">
                            <strong>{{ $errors->first('CurrentPassword') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Change Password
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