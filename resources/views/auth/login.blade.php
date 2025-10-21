@extends('layouts.website.master')
@section('title', $page_title)
@section('meta')
    <meta content="" name="description">
    <meta content="" name="keywords">
@endsection
@section('content')
<main class="inner-bg">
    <section class="inner-banner">
      <div class="container">
        <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic"
        data-aos-duration="1000">Log <span>In</span></h1>
      </div>
    </section>
</main>
<!-- Inner Page Banner  -->
<!-- Login  -->
<section class="login-sec auth-forms py-100">
    <div class="container">
        @if(count($errors) > 0 )
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        @if(session('login-first'))
            <div class="alert alert-danger">{{session('login-first')}}</div>
        @endif
        <div class="row align-items-center text-center text-lg-start row-gap-40 justify-content-center">
            <div class="col-lg-6">
                <div class="iner-baner-head">
                    <h3 class="heading fs-60 mb-10">WELCOME <span>TO</span></h3>
                    <h1 class="heading fs-60 mb-10">NEVER <span>FORGET</span></h1>
                    <h4 class="heading fs-60 mb-20">Showing <span>Appreciation</span></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,  sed do <br> eiusmod tempor incididunt ut labore et dolore magna alion.</p>
                </div>
            </div>
            <div class="col-lg-6 form-bg">
                <div class="log-forms field-wrapper text-center text-lg-start">
                    {{-- <h1 class="heading fs-74 mb-10">LOGIN</h1> --}}
                    <h4 class="heading fs-28 mb-30"><span>Customer Login Panel</span></h4>
                    <!-- Error message -->
                    <form method="POST" action="{{ route('user-authenticate') }}">
                        <!-- CSRF token -->
                        @csrf
                        <input type="hidden" name="user_type" value="User">
                        <div class="form-group mb-20">
                            <input type="email"  class="input-field" value="{{ old('email') }}" name="email" placeholder="Enter user email">
                            <span style="color: red">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group mb-20">
                            {{-- <input class="" type="password" placeholder="Password" name="password" required autocomplete="current-password">
                            <span style="color: red"></span> --}}
                            <input type="password" id="password" class="  input-field" name="password" placeholder="Enter password">
                            <span style="color: red">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group mb-20">
                            <button type="submit" class="login-btn btn primary-btn mx-auto mx-lg-0" name="form1">LOGIN</button>
                        </div>
                        <div class="form-check mb-20">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-muted" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                    </form>
                    <div class="form-under-btn">
                        <!--<div class="forgot"><a href="">Forgot Password?</a></div>-->
                        <p class="text-muted">Don't have an account? <a class="ms-2 heading fs-16" href="{{ route ('register') }}">Sign Up</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection