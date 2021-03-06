@extends('layouts.anonymous.master')

@section('content')

    <p class="login-box-msg">Sign in to start your session</p>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="/auth/login">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
        </div>

    </form>

    <a href="/password/email">I forgot my password</a><br>
    <a href="/auth/register" class="text-center">Register a new membership</a>

@endsection
