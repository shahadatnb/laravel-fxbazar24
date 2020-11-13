@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-sm-8">
            <div class="card panel-default">

                <div class="card-body">
                <h5 class="card-title">Register</h5>
                @include('layouts._message')
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        @include('auth.reg_field')

                        <div class="form-group">
                            <div class="col col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
