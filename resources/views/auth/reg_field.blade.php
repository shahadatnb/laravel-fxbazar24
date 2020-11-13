<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col control-label">Full Name</label>

    <div class="col">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="username" class="col control-label">Username</label>

    <div class="col">
        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col control-label">E-Mail Address</label>

    <div class="col">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{-- $errors->has('mobile') ? ' has-error' : '' --}}">
    <label for="mobile" class="col control-label">Mobile No</label>

    <div class="col">
        <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

        @if ($errors->has('mobile'))
            <span class="help-block">
                <strong>{{ $errors->first('mobile') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col control-label">Password</label>

    <div class="col">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col control-label">Confirm Password</label>

    <div class="col">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>

<div class="form-group{{ $errors->has('hand') ? ' has-error' : '' }}">
    <label for="hand" class="col control-label">Side</label>

    <div class="col">
        {{ Form::select('hand', ['1' => 'Left Side', '2' => 'Right Side'
                      ], null, ['class'=>'form-control','required'=>'','placeholder' => 'Hand Side']) }}

        @if ($errors->has('hand'))
            <span class="help-block">
                <strong>{{ $errors->first('hand') }}</strong>
            </span>
        @endif
    </div>
</div>

<!-- 
{{-- <div class="form-group{{ $errors->has('pin') ? ' has-error' : '' }}">
    <label for="pin" class="col control-label">PIN</label>

    <div class="col">
        <input id="pin" type="text" class="form-control" name="pin" value="{{ old('pin') }}" required>

        @if ($errors->has('pin'))
            <span class="help-block">
                <strong>{{ $errors->first('pin') }}</strong>
            </span>
        @endif
    </div>
</div> --}}
-->


{{-- <div class="form-group{{ $errors->has('referralId') ? ' has-error' : '' }}">
    <label for="referralId" class="col control-label">Referral ID</label>

    <div class="col">
        <input id="referralId" type="number" class="form-control" name="referralId" value="{{ old('referralId') }}" required>

        @if ($errors->has('referralId'))
            <span class="help-block">
                <strong>{{ $errors->first('referralId') }}</strong>
            </span>
        @endif
    </div>
</div> --}}

<div class="form-group{{ $errors->has('placementId') ? ' has-error' : '' }}">
    <label for="placementId" class="col control-label">Placement ID</label>

    <div class="col">
        <input id="placementId" type="number" class="form-control" name="placementId" value="{{ old('placementId') }}" required>

        @if ($errors->has('placementId'))
            <span class="help-block">
                <strong>{{ $errors->first('placementId') }}</strong>
            </span>
        @endif
    </div>
</div>