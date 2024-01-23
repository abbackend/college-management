@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}"><b>{{ config('app.name', 'Laravel') }}</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="login-box-msg">{{ __('You forgot your password? Here you can easily retrieve a new password.') }}</div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group has-feedback @error('email') has-error @enderror">
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
                @if (Route::has('password.request'))
                    <a class="btn btn-link pull-right" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
@endsection
