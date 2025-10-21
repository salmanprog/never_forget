@extends('auth.admin.layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
           <img src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_logo'] }}" alt="logo"style="width: 250px;">
        </div>
        <div class="card-body login-box-body">
            <form method="POST" action="{{ route('user-authenticate') }}" class="animated-form">
                @csrf

                <input type="hidden" name="user_type" value="Admin">
                <div class="animated-input">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input class="animated-field" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
                    @error('email')
                        <span class="animated-error" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="animated-input">
                    <label for="password">{{ __('Password') }}</label>
                    <input class="animated-field" placeholder="Password" name="password" type="password" autocomplete="off" value="">
                    @error('password')
                        <span class="animated-error" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="animated-checkbox">
                    <input class="animated-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="animated-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="animated-button-container">
                    <button type="submit" class="animated-button">
                        {{ __('Login') }}
                    </button>

                    <a class="animated-link" href="{{ route('admin.forgot_password') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
