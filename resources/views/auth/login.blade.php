@extends('layouts.auth')

@push('styles')
<style>
    .captcha-preview{
        width: 100%;
        height: 40px;
        line-height: 35px;
        letter-spacing: 8px;
        border: dashed 1.5px;
        border-radius: 0.5em;
        margin-top: 1.6em;
        text-align: center;
    }
</style>
@endpush

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}"><b>{{ config('app.college.name') }}</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>
        <form id="login" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group has-feedback @error('email') has-error @enderror">
                <input type="text" name="email" class="form-control" placeholder="{{ __('Email Address / Enroll Number') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @error('email')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group has-feedback @error('password') has-error @enderror">
                <input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @error('password')
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group captcha-preview"></div>
            <div class="form-group has-feedback captcha-value">
                <input type="text" class="form-control" placeholder="{{ __('Enter captcha') }}" required>
                <span class="d-none help-block"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Sign In') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

@push('scripts')
<script>
    $(function() {
        generateCaptcha();
        function generateCaptcha() {
            let value = Math.floor(100000 + Math.random() * 900000);
            $('.captcha-preview').text(value);
        }

        $('form#login').submit(function (event) {
            let value = $('.captcha-value').find('input').val();
            let match = $('.captcha-preview').text();

            if (value == '') {
                event.preventDefault();
                $('.captcha-value').addClass('has-error');
                $('.captcha-value').find('span.help-block').html('<strong>This field is required.</strong>');
                $('.captcha-value').find('span.help-block').removeClass('d-none');
                generateCaptcha();
                return;
            } else if (value != match) {
                event.preventDefault();
                $('.captcha-value').addClass('has-error');
                $('.captcha-value').find('span.help-block').html('<strong>This value is invalid.</strong>');
                $('.captcha-value').find('span.help-block').removeClass('d-none');
                generateCaptcha();
                return;
            }
        });
    });
</script>
@endpush