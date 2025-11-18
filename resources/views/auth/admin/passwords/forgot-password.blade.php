@extends('auth.admin.layouts.app')

@section('title', $page_title)

@push('css')
@endpush

@section('content')
    <div class="login-box">
        <div class="login-logo" style="width: 370px">
            <b>Send Password Reset Link</b>
        </div>
        <div class="card-body login-box-body">
            <form method="GET" action="{{ route('admin.send-password-reset-link') }}">
                @csrf

                <div class="animated-input">
                    <label for="email"  class="">{{ __('Email Address') }}</label>
                    <input class="animated-field"  placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-0">
                    <div class="col-md-12">
                        <button type="submit"  class="animated-button" style="background-color: #cfa40c;" onmouseover="this.style.backgroundColor='#0a2749'" onmouseout="this.style.backgroundColor='#cfa40c'">
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
