@extends('layouts.website.master')
<head>
    <title>Sign Up</title>
</head>
@section('meta')
    <meta content="" name="description">
    <meta content="" name="keywords">
@endsection
@section('content')
    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Sign
                    <span>Up</span>
                </h1>
            </div>
        </section>
    </main>
    <!-- Inner Page Banner  -->
    <!-- sign-up form -->
    <section class="signup-form auth-forms py-100">
        <div class="container">
            <div class="row align-items-center text-center text-lg-start">
                <div class="col-lg-6 field-wrapper" style="margin-bottom: 0">
                    <div class="new-agents">
                        <h2 class="heading fs-60 mb-20">Create a <span>New Account</span></h2>
                    </div>
                    <form method="POST" action="{{ route('new-register') }}" class="sing-form">
                        @csrf
                        <div class="new-agents form-row pt-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-20">
                                        <span style="color: red">{{ $errors->first('account_type') }}</span>
                                        <label class="form-label">Account Type <span style="color: red">*</span></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="account_type" id="individual" value="Individual" {{ old('account_type') == 'Individual' ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="individual">
                                                        Individual Account
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="account_type" id="company" value="Company" {{ old('account_type') == 'Company' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="company">
                                                        Company Account
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-20">
                                        <span style="color: red">{{ $errors->first('first_name') }}</span>
                                        <input type="text" id="first_name" class="input-field"
                                            value="{{ old('first_name') }}" name="first_name" placeholder="First Name"
                                            required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-20">
                                        <span style="color: red">{{ $errors->first('last_name') }}</span>
                                        <input type="text" id="last_name" class="input-field"
                                            value="{{ old('last_name') }}" name="last_name" placeholder="Last Name" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-20">
                                        <span style="color: red">{{ $errors->first('email') }}</span>
                                        <input type="email" class="input-field" value="{{ old('email') }}"
                                            name="email" placeholder="Email" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-20">
                                        <input type="phone" class="input-field" name="phone"
                                            placeholder="Phone" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-20">
                                        <span style="color: red">{{ $errors->first('password') }}</span>
                                        <input type="password" id="password" class="input-field"
                                            name="password" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-20">
                                        <span style="color: red">{{ $errors->first('password_confirmation') }}</span>
                                        <input type="password" id="password_confirmation" class="input-field"
                                            name="password_confirmation" placeholder="Confirm password" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-20 enroll-frm-btn">
                                        <button type="submit" style="cursor:pointer"
                                            class="btn primary-btn btn-warning-signup btn-new mx-auto mx-lg-0"
                                            name="form1">REGISTER</button>
                                    </div>
                                </div>
                                <div class="form-group form-check" style="padding-left: 0px">
                                    <p class="account text-muted">Already have an Account? <a class="ms-2 heading fs-16"
                                            href="{{ route('login') }}">Log In</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="enroll-image d-flex justify-content-center d-none d-lg-block">
                        <img src="{{ asset('public/assets/website/images') }}/register.png" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection