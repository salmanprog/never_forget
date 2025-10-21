@extends('layouts.website.master')
@section('content')
<link href="{{asset('public/assets/website/vendor/aos/aos.css')}}" rel="stylesheet">
<style>
    .about-img{
   /*  margin-top: 70px; */
    text-align: center;
    height: 450px; /* Fixed height for the image container */
    display: flex;
    align-items: center;
    justify-content: center;
}

.about-img img {
    max-width: 100%;
    height: 440px; /* Fixed height for the image itself */
    border-radius: 30px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    transition: transform 0.4s ease-in-out;
    animation: float 6s ease-in-out infinite; /* Added float animation */
}

.about-img img:hover {
    transform: scale(1.03);
}

@keyframes float {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
    100% {
        transform: translateY(0px);
    }
}

.inner-page-heading {
    padding: 100px 0;
    text-align: center;
}

.inner-page-heading h1 {
    font-size: 3.8rem;
    font-weight: 700;
    color: #fff;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
    letter-spacing: 2px;
}

.about-section {
    margin-bottom: 0 !important;
    padding: 80px 0;
    background-color: #f8f9fa;
}

/* .about-info {
    padding-right: 40px;
} */

.about-info h1 {
    font-size: 2.8rem;
    font-weight: 600;
    color: #081e37;
    margin-bottom: 40px;
    text-align: center;
    position: relative;
    padding-bottom: 15px;
}

.about-info h1::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background-color: #cfa40c; /* Gold accent line */
    border-radius: 2px;
}

#main #faq .card .card-header .btn-header-link {
    color: #fff;
    display: block;
    text-align: left;
    background: #081e37;
    padding: 15px;
    border-radius: 8px 8px 0 0;
    border-left: 1px solid #081e37;
    border-right: 1px solid #081e37;
    border-top: 1px solid #081e37;
    border-bottom: 1px solid #081e37;
}
.card a.btn.btn-header-link {
    font-size: 18px;
    font-family: 'Cocogoose', sans-serif !important;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
}
.card a.btn.btn-header-link:hover {
    background: #cfa40c;
    color: #081e37;
}
#main #faq .card .card-header {
    border: 0;
    border-radius: 5px;
    padding: 0; 
}
#main #faq .card {
    margin-bottom: 20px;
    border: 0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
.card-body {
    background: #efe4c3 !important; /* Lighter shade of gold */
    font-size: 16px;
    line-height: 1.8;
    color:#333;
    padding: 20px;
    border-radius: 0 0 5px 5px;
}
#main #faq .card .card-header .btn-header-link.collapsed:after {
    content: "\f067"; /* Plus icon */
    font-family: 'FontAwesome';
    font-weight: 900;
    float: right;
    transform: rotate(0deg);
    transition: transform 0.3s ease;
}
#main #faq .card .card-header .btn-header-link:after {
    content: "\f068"; /* Minus icon */
    font-family: 'FontAwesome';
    font-weight: 900;
    float: right;
    transform: rotate(180deg);
    transition: transform 0.3s ease;
}
#main #faq .card .collapse.show {
    background: #081e37; /* Darker background for expanded state */
    line-height: 1.8;
    color: #fff;
    border-left: 1px solid #cfa40c;
    border-right: 1px solid #cfa40c;
    border-bottom: 1px solid #cfa40c;
}
#main #faq .card .collapse {
    border: 0;
}

</style>
@section('title', $page_title)
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Frequently <span>Asked</span> Questions
            </h1>
        </div>
    </section>
</main>

<section class="about-section" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-start">
            <div id="main" class="col-md-6 mt-5" data-aos="fade-right">
                <div class="about-info mt-5">
                    {{-- <h1>Frequently Asked Questions</h1> --}}
                    <div class="accordion" id="faq">
                        @php $count=1 @endphp
                        @foreach ($questions as $question)
                            <div class="card" data-aos="fade-up" data-aos-delay="{{ ($count - 1) * 100 }}">
                                <div class="card-header" id="faqhead{{ $question->id }}">
                                    <a href="#" class="btn btn-header-link @if ($count != 1){{'collapsed'}}@endif" data-toggle="collapse" data-target="#faq{{ $question->id }}" aria-expanded="@if ($count ==1){{'true'}} @else{{'false'}}  @endif" aria-controls="faq{{ $question->id }}">{{ $question->question }}</a>
                                </div>
                                <div id="faq{{ $question->id }}" class="collapse @if ($count ==1){{'show'}}  @endif" aria-labelledby="faqhead{{ $question->id }}" data-parent="#faq">
                                    <div class="card-body">
                                    {!! $question->answer !!}
                                    </div>
                                </div>
                            </div>
                            @php $count++ @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="about-img" data-aos="fade-left">
                    <img src="{{asset('public/assets/website/images')}}/faqs.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script src="{{asset('public/assets/website/vendor/aos/aos.js')}}"></script>
<script>
    AOS.init({
        duration: 1000,
        easing: "ease-in-out",
        once: true,
        mirror: false
    });
</script>
@endsection
