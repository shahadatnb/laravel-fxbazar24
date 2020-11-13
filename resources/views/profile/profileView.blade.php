@extends('layouts.master')
@section('title','Profile view')
@section('stylesheet')
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Main content -->
  <div class="card">
    <div class="card-body">
      <div class="row">
      <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card box-primary">
            <div class="card-body box-profile">
              @if($user->photo != null )
              <img class="profile-user-img img-responsive img-circle" src="{{url('/')}}/public/upload/member/{{ $user->photo }}" alt="profile picture">
              @else
              <img src="{{ url('/')}}/public/admin/dist/img/avatar.png" class="img-circle" alt="User Image">
              @endif

              <h3 class="profile-username text-center">{{ $user->name }}</h3>
              <h6 class="profile-username text-center">ID: {{ $user->id }}</h6>

              <p class="text-muted text-center"></p>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <h3>Password Chenge</h3>
            {!! Form::open(['url' => 'changePassAdmin','class'=>'form-horizontal']) !!}              
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="text" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Change Password
                    </button>
                </div>
            </div>
          {!! Form::close() !!}
          <table class="table">
            <tr>
              <td></td>
              <td>ID no</td>
              <td>{{ $user->id }}</td>
            </tr>
            <tr>
              <td></td>
              <td>Username</td>
              <td>{{ $user->username }}</td>
            </tr>
            <tr>
              <td></td>
              <td>Full Name</td>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <td></td>
              <td>Mobile</td>
              <td>{{ $user->mobile }}</td>
            </tr>
            @foreach($wallets as $item)
            <tr>
              <td></td>
              <td>{{$item['title']}}</td>
              <td>{{$item['balance']}} Tk</td>
            </tr>
            @endforeach
            <tr>
              <td></td>
              <td>Email</td>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <td></td>
              <td>Joining Date</td>
              <td>{{ $user->created_at->format('d M Y') }}</td>
            </tr>
            <tr>
              <td></td>
              <td>Referral ID</td>
              <td>{{ $user->referralId }}</td>
            </tr>
            <tr>
              <td></td>
              <td>Placement ID</td>
              <td>{{ $user->placementId }}</td>
            </tr>
          </table>   
          
        </div>
        <!-- /.col -->
      </div>
    </div>
  </div>
</div>
          
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Profile Photo</h4>
      </div>
      {!! Form::open(array('route'=>['changePhoto',Auth::user()->id],'method'=>'PUT', 'files' => true)) !!}
      <div class="modal-body">
        <p>{{ Form::file('photo',null,array('class'=>'form-control','required'=>'')) }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {{ Form::submit('Update Photo',array('class'=>'btn btn-primary')) }}
      </div>
      {!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



    
    @endsection
    @section('scripts')
    @endsection