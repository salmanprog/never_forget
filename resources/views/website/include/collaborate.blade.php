<section class="collaborate-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-header">
                    <h3 class="mb-20 heading text-center fs-64" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1000">Our <span>Collaborators</span></h3>
                </div>
                
                <div class="collaborate-images">
                    <div class="swiper logo-swapper">
                        <div class="swiper-wrapper">
                            @foreach($collaborators as $collaborator)
                            <div class="swiper-slide">
                                @if(!empty($collaborator->slug))
                                    <a href="{{ route('collaborators.show', $collaborator->slug) }}" title="{{ $collaborator->title }}">
                                        <img src="{{ $collaborator->image_url }}" alt="{{ $collaborator->title }}">
                                    </a>
                                @else
                                    <img src="{{ $collaborator->image_url }}" alt="{{ $collaborator->title }}">
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>