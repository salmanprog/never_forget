@extends('auth.layouts.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <div class="login-box">
        <div class="login-logo" style="width: 370px">
            <b>Send Password Reset Link</b>
        </div>
        <div class="card-body login-box-body">
            <form method="GET" action="{{ route('send-password-reset-link') }}">
                @csrf

                <div class="form-group has-feedback" class="animated-input">
                    <label for="email" class="col-md-6 col-form-label">{{ __('Email Address') }}</label>
                    <input class="form-control" class="animated-field" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="animated-button" style="background-color: #9e001c;" onmouseover="this.style.backgroundColor='#006166'" onmouseout="this.style.backgroundColor='#9e001c'">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
@endpush
