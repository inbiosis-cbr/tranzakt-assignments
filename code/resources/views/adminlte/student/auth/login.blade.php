@extends('adminlte.student.layout.auth')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('home') }}"><b>Engage</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post" action="{{ url('/student/login') }}">
        {{ csrf_field() }}

      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}"">
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @if ($errors->has('email'))
            <p class="text-danger">{{ $errors->first('email') }}</p>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}"">
        <input type="password" name="password" class="form-control" placeholder="Password">        
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <p class="text-danger">{{ $errors->first('password') }}</p>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{ url('/student/password/reset') }}">I forgot my password</a><br>
    <a href="{{ url('/student/register') }}" class="text-center">Register new account</a>

    @yield('content')

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
