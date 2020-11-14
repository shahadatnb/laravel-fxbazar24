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
          @include('layouts._message')
          {!! Form::model($user,['url' => ['updateProfile'],'method'=>'POST','class'=>'form-horizontal']) !!}
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Full Name</label>

                <div class="col-md-6">
                    {{ Form::text('name',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="col-md-4 control-label">Username</label>

                <div class="col-md-6">
                    {{ Form::text('username',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    {{ Form::text('email',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}
                </div>
            </div>

            <div class="form-group">
              <label for="pin" class="col-md-4 control-label">TRX-PIN</label>
              <div class="col-md-6">
              {{Form::number('pin',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255'))}}
              </div>
          </div>

            <div class="form-group">
                <label for="mobile" class="col-md-4 control-label">Mobile</label>

                <div class="col-md-6">
                    {{ Form::text('mobile',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}
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