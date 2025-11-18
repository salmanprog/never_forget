<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_favicon'] }}" type="image/png" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="{{ asset('public/assets') }}/website/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('public/assets') }}/website/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'against';
            font-style: normal;
            font-weight: 400;
            src: local('against'), url('https://fonts.cdnfonts.com/s/72739/AgainstRegular-Wy5pv.woff') format('woff');
        }
    </style>
    <!-- font family  -->
    <!-- FontAwsome Cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FontAwsome Cdn  -->

    <!-- custom css  -->
    {{-- <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('public/assets/website') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('public/assets/website') }}/css/responsive.css">
    {{-- <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}"> --}}
    @yield('css')
    @stack('css')

</head>
{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link rel="stylesheet" href="{{ asset('public/assets/website') }}/css/style.css">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/toastr.min.css')}}">
    <link rel="icon" href="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_favicon'] }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Never Forget Showing Appreciation</title>
    @stack('css')
</head> --}}

<body>
    <!-- Header -->
    @include('layouts.website.header')
    <!-- Header End -->

    @yield('content')

    <!-- Footer -->
    @include('layouts.website.footer')
    <!-- Footer End -->

{{-- <div id="back-top" style="display: block;">
    <a href="#top"> <span class="fa fa-arrow-circle-o-up" id="topbutton"></span></a>
</div>
<script src="{{ asset('public/assets/website') }}/js/main.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

<script src="{{asset('public/admin/assets/js/toastr.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script> --}}
{{--
@stack('js')
<script>
    $(document).on('click', '.navigatee ul li', function() {
        $(this).addClass('selected').siblings().removeClass('selected');
    });
      $(document).on('click', '.subscriber-btn', function(){
            var email = $('.subscriber_email').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('newsletter.store') }}",
                data : {'email' : email},
                type : 'POST',
                success : function(response){
                    console.log(response);
                    if(response==3){
                        Swal.fire(
                          'Alert!',
                          'Enter email.',
                          'warning',
                        )
                    }else if(response==2){
                        Swal.fire(
                          'Alert!',
                          'This is already subsribed.',
                          'warning',
                        )
                    }else{
                        $('.subscriber_email').val('');
                        Swal.fire(
                          'Congratulations!',
                          'You have subscribed successfully.',
                          'success',
                        )
                    }
                }
            });
        });
</script>
<script>
    AOS.init();
  </script>
  <script>
    var btn = $('#topbutton');

    $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
    });

    btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
    });
  </script>
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>

</body>

</html>
 --}}

 <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Custom JavaScript or jQuery  -->
    <script>
        $(document).ready(function () {
            $('.nav-button').click(function () {
                $('body').toggleClass('nav-open');
            });
        });

    </script>
       <script>
        $(document).ready(function () {
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>
    <!-- data table js  -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
<script>
    $(document).on('click', '.navigatee ul li', function() {
        $(this).addClass('selected').siblings().removeClass('selected');
    });
      $(document).on('click', '.subscriber-btn', function(){
            var email = $('.subscriber_email').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ route('newsletter.store') }}",
                data : {'email' : email},
                type : 'POST',
                success : function(response){
                    console.log(response);
                    if(response==3){
                        Swal.fire(
                          'Alert!',
                          'Enter email.',
                          'warning',
                        )
                    }else if(response==2){
                        Swal.fire(
                          'Alert!',
                          'This is already subsribed.',
                          'warning',
                        )
                    }else{
                        $('.subscriber_email').val('');
                        Swal.fire(
                          'Congratulations!',
                          'You have subscribed successfully.',
                          'success',
                        )
                    }
                }
            });
        });
</script>
<script>
    AOS.init();
  </script>
  <script>
    var btn = $('#topbutton');

    $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
    });

    btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
    });
  </script>
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
</script>



@yield('footer_scripts')

</body>
</html>
