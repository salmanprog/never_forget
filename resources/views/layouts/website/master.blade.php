<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    @yield('meta')
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['header_favicon'] }}"
        type="image/png" sizes="16x16">
    <link href="{{ asset('public/assets/website/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/6.7.0/css/flag-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{asset('public/assets/website/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('public/assets/website/libs/libs.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/website/css/utilities.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/website/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/website/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/website/css/modal.css') }}" rel="stylesheet">


</head>


<body class="position-relative" class="translater-area">
    
    <!-- ======= Header ======= -->
    @include('layouts.website.header')
    <!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    @include('layouts.website.footer')
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Template Main JS File -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('public/assets/website/libs/libs.js') }}"></script>
    <script src="{{ asset('public/assets/website/js/main.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('public/assets/website/vendor/aos/aos.js')}}"></script>


    <script>
        // Add a JavaScript translation function
        window.__ = function(key) {
            // You can load translations via AJAX or embed them in the page
            var translations = @json(trans()->get('*'));
            return translations[key] || key;
        };
    </script>
    @stack('js')
    <script>
        var swiper = new Swiper(".logo-swapper", {
            slidesPerView: 6,
            spaceBetween: 30,
            loop: true,
            loopedSlides: 6,
            speed: 3000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                    speed: 2000,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    speed: 2000,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                    speed: 3000,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                    speed: 3000,
                },
                1200: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                    speed: 3000,
                },
                1366: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                    speed: 3000,
                },
                1920: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                    speed: 3000,
                },
            },
        });
    </script>
    <script type="text/javascript">
        function toggleDropdown() {
            document.querySelector('.dropdown-menu.flag').classList.toggle('show');
        }

       /* function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,fr,de,ar,zh-CN,es,it,pt,ja,ru,hi,vi,tl,ko,ur'
            }, 'google_translate_element');
        }*/

        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,es,zh-CN,tl,vi,ar,fr,ko,ru,de' // English, Spanish, Chinese (Mandarin & Cantonese), Tagalog (Filipino), Vietnamese, Arabic, French, Korean, Russian, German
                // Top 10 languages only
            }, 'google_translate_element');
        }

        const flags = document.querySelectorAll('.flag_link');
        const mainFlag = document.querySelector('.main-flg');

        function changeLanguage(lang, imgSrc) {
            const intervalId = setInterval(() => {
                const select = document.querySelector("select.goog-te-combo");
                if (select) {
                    select.value = lang;
                    select.dispatchEvent(new Event("change"));
                    mainFlag.src = imgSrc;
                    clearInterval(intervalId);
                }
            }, 100);
        }

        flags.forEach(el => {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                const lang = this.dataset.lang;
                const img = this.querySelector('img').src;
                changeLanguage(lang, img);
                document.querySelector('.dropdown-menu.flag').classList.remove('show');
            });
        });
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"> </script>
</body>

</html>
