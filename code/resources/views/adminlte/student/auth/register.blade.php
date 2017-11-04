@extends('adminlte.student.layout.auth')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="{{ route('home') }}"><b>Engage</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new student account</p>

    <form method="post" action="{{ url('/student/register') }}">
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
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register as student</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <br />
    <a href="{{ url('/student/login') }}" class="btn btn-default btn-block btn-flat">Sign In My Account</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection
