@extends('adminlte.teacher.layout.auth')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="{{ route('home') }}"><b>Engage</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new teacher account</p>

    <form method="post" action="{{ url('/teacher/register') }}">
        {{ csrf_field() }}

      <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
        <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @if ($errors->has('name'))
            <p class="text-danger">{{ $errors->first('name') }}</p>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <p class="text-danger">{{ $errors->first('password') }}</p>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password_confirmation'))
            <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register as Teacher</button>
          <p class="small">
            NOTE: Registration require administrator approval to login.
          </p>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <br />
    <a href="{{ url('/teacher/login') }}" class="btn btn-default btn-block btn-flat">Sign In My Account</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection

@php
/*
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/teacher/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
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
*/
@endphp
