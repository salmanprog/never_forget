<section id="testimonials" class="testimonials testimonials-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h3 class="primary-color">Clients Reviews</h3>
            <h2>
                <img src="{{ asset('public/assets/website/images/left-quote.png') }}" class="testimonials-quote">
                What Clients Are Say’s 
                <img src="{{ asset('public/assets/website/images/right-quote.png') }}" class="testimonials-quote">
            </h2>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <?php $testimonials = App\Models\Testimonial::where('status', 1)->get() ?>
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-flaxed">
                                <img src="{{ asset('public/admin/assets/images/testimonials') }}/{{ $testimonial->image }}" class="testimonial-img" alt="">
                                <h3>
                                    {{$testimonial->name}}
                                    <span class="client-position">
                                        {{$testimonial->designation}}
                                    </span>
                                </h3>
                            </div> 
                            {!! $testimonial->comment !!} 
                        </div>
                    </div><!-- End testimonial item -->
                @endforeach

            </div>
            <!-- Navigation buttons outside swiper-wrapper -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Add pagination if needed -->
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>