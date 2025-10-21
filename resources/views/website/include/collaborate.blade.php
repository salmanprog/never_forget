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
                                @if($collaborator->image)
                                <img src="{{ asset('public/admin/assets/images/collaborators/' . $collaborator->image) }}" alt="{{ $collaborator->title }}">
                                @else
                                <img src="{{ asset('public/admin/assets/images/default.jpg') }}" alt="Default">
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