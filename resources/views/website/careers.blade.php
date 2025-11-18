@extends('layouts.website.master')
@section('content')
@section('title', $page_title)

<!-- Inner Page Banner  -->
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Careers</h1>
        </div>
    </section>
</main>

<style>
.shop-nav {
    background: #fff;
    border-radius: 50px; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch; 
    gap: 20px;
}

.shop-nav .nav-link {
    color: #333;
    padding: 10px 25px;
    border-radius: 25px;
    font-weight: 500;
    white-space: nowrap;
    transition: all 0.3s ease;  
    text-align: center;
}

.shop-nav .nav-link.active {
    background: #0B1B48;
    color: white;
}

.shop-nav .nav-link:hover:not(.active) {
    background: #f0f0f0;
}

.shop-nav::-webkit-scrollbar {
    display: none;
}

.shop-nav {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.career-card-wrapper {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.career-card-wrapper:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.career-card-wrapper img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.career-card-wrapper:hover img {
    transform: scale(1.05);
}

.career-card-wrapper h5 {
    font-size: 18px;
    font-weight: 600;
    color: #0B1B48;
    margin-bottom: 15px;
    line-height: 1.4;
    height: 5rem;
    padding: 0 30px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.career-card-wrapper a {
    background: #0B1B48;
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    width: 87%;
    margin: 0 auto;
}

.career-card-wrapper a:hover {
    background: #cfa40c;
    color: #0b1b48;
    transform: translateY(-5px);
}

.text-secondry-theme {
    color: #F5A623;
}

.text-primary-theme-light {
    color: #0B1B48;
}

.career-info {
    padding: 20px 0;
}

.career-title {
    font-size: 18px;
    font-weight: 600;
    color: #0B1B48;
    margin-bottom: 15px;
    line-height: 1.4;
    height: 5rem;
    padding: 0 30px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.career-description {
    padding: 0 30px;
    margin-bottom: 20px;
    color: #666;
    font-size: 14px;
    line-height: 1.5;
    height: 4rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.career-category {
    padding: 0 30px;
    margin-bottom: 20px;
}

.category-badge {
    background: #F5A623;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    display: inline-block;
}

.apply-now {
    background: #0B1B48;
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    width: 87%;
    margin-top: auto;
    margin: 0 auto; 
}

.apply-now:hover {
    background: #cfa40c;
    color: #0b1b48;
    transform: translateY(-5px);
}

.career-item {
    margin-bottom: 30px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.5s ease-out;
}

.career-item.visible {
    opacity: 1;
    transform: translateY(0);
}

.loading-spinner {
    display: none;
    margin: 20px 0;
}
</style>

<section class="corporate-gifts-sec py-150">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Join Our Team
                </span>
                <h2 class="heading fs-74 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Career <span>Opportunities</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills shop-nav" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-All-tab" data-bs-toggle="pill" data-bs-target="#pills-All" type="button" role="tab" aria-controls="pills-All" aria-selected="true">All</button>
                    </li>
                    @foreach($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-{{$category->id}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$category->id}}" type="button" role="tab" aria-controls="pills-{{$category->id}}" aria-selected="false">{{$category->title}}</button>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <!-- All Careers Tab -->
                    <div class="tab-pane fade show active" id="pills-All" role="tabpanel" aria-labelledby="pills-All-tab" tabindex="0">
                        <div class="row" id="all-careers">
                            @foreach($all_careers as $career)
                            <div class="col-lg-4 col-md-6 career-item visible">
                                <div class="career-card-wrapper">
                                    @if($career->image)
                                        <img src="{{asset('public/admin/assets/images/careers')}}/{{$career->image}}" alt="{{$career->title}}">
                                    @else
                                        <img src="{{asset('public/assets/website/images/default-career.jpg')}}" alt="{{$career->title}}">
                                    @endif
                                    <div class="career-info">
                                        <h3 class="career-title">{{$career->title}}</h3>
                                        <div class="career-description">
                                            {!!$career->description!!}
                                        </div>
                                        @if($career->hasCategory)
                                        <div class="career-category">
                                            <span class="category-badge">{{$career->hasCategory->title}}</span>
                                        </div>
                                        @endif
                                        <a href="{{route('careers.apply.form')}}?career_id={{$career->id}}" class="apply-now">
                                            Apply Now
                                            <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-center loading-spinner" id="loading-spinner">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <!-- Individual Category Tabs -->
                    @foreach($categories as $category)
                    <div class="tab-pane fade" id="pills-{{$category->id}}" role="tabpanel" aria-labelledby="pills-{{$category->id}}-tab" tabindex="0">
                        <div class="row" id="category-careers-{{$category->id}}">
                            @forelse($category->careers as $career)
                            <div class="col-lg-4 col-md-6 career-item visible">
                                <div class="career-card-wrapper">
                                    @if($career->image)
                                        <img src="{{asset('public/admin/assets/images/careers')}}/{{$career->image}}" alt="{{$career->title}}">
                                    @else
                                        <img src="{{asset('public/assets/website/images/default-career.jpg')}}" alt="{{$career->title}}">
                                    @endif
                                    <div class="career-info">
                                        <h3 class="career-title">{{$career->title}}</h3>
                                        <div class="career-description">
                                            {!!$career->description!!}
                                        </div>
                                        <div class="career-category">
                                            <span class="category-badge">{{$category->title}}</span>
                                        </div>
                                        <a href="{{route('careers.apply.form')}}?career_id={{$career->id}}" class="apply-now">
                                            Apply Now
                                            <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <p class="text-center">No careers found in this category.</p>
                            </div>
                            @endforelse
                        </div>
                        <div class="text-center loading-spinner" id="loading-spinner-{{$category->id}}">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
let page = 1;
let loading = false;
let activeCategory = 'all';
let hasMoreCareers = true;

// Function to check if element is in viewport
function isInViewport(element) {
    if (!element) return false;
    const rect = element.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
    return rect.top <= windowHeight + 200; // Increased buffer to 200px for earlier loading
}

// Function to load more careers
function loadMoreCareers() {
    if (loading || !hasMoreCareers) return;
    
    loading = true;
    page++;
    
    const spinner = activeCategory === 'all' 
        ? document.getElementById('loading-spinner')
        : document.getElementById(`loading-spinner-${activeCategory}`);
    spinner.style.display = 'block';

    const url = activeCategory === 'all' 
        ? `/load-more-careers?page=${page}`
        : `/load-more-category-careers/${activeCategory}?page=${page}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const container = activeCategory === 'all'
                ? document.getElementById('all-careers')
                : document.getElementById(`category-careers-${activeCategory}`);

            if (!data.careers || data.careers.length === 0) {
                hasMoreCareers = false;
                spinner.style.display = 'none';
                return;
            }

            data.careers.forEach((career, index) => {
                const careerElement = document.createElement('div');
                careerElement.className = 'col-lg-4 col-md-6 career-item';
                
                const imageSrc = career.image 
                    ? `{{ asset('public/admin/assets/images/careers') }}/${career.image}`
                    : `{{ asset('public/assets/website/images/default-career.jpg') }}`;
                
                careerElement.innerHTML = `
                    <div class="career-card-wrapper">
                        <img src="${imageSrc}" alt="${career.title}">
                        <div class="career-info">
                            <h3 class="career-title">${career.title}</h3>
                            <div class="career-description">
                                ${career.description || ''}
                            </div>
                            ${career.has_category ? `<div class="career-category"><span class="category-badge">${career.has_category.title}</span></div>` : ''}
                            <a href="{{ route('careers.apply.form') }}?career_id=${career.id}" class="apply-now">
                                Apply Now
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                `;
                
                container.appendChild(careerElement);
                
                // Trigger animation with delay
                setTimeout(() => {
                    careerElement.classList.add('visible');
                }, index * 100);
            });

            loading = false;
            spinner.style.display = 'none';
        })
        .catch(error => {
            console.error('Error:', error);
            loading = false;
            spinner.style.display = 'none';
        });
}

// Handle tab changes
document.querySelectorAll('[data-bs-toggle="pill"]').forEach(tab => {
    tab.addEventListener('shown.bs.tab', function (e) {
        const targetId = e.target.getAttribute('data-bs-target');
        activeCategory = targetId === '#pills-All' ? 'all' : targetId.replace('#pills-', '');
        page = 1;
        hasMoreCareers = true;
        loading = false; // Reset loading state on tab change
    });
});

// Improved scroll detection with debounce
let scrollTimeout;
function handleScroll() {
    const activePane = document.querySelector('.tab-pane.active');
    if (activePane) {
        const lastCareer = activePane.querySelector('.career-item:last-child');
        if (lastCareer && isInViewport(lastCareer)) {
            loadMoreCareers();
        }
    }
}

window.addEventListener('scroll', function() {
    if (scrollTimeout) {
        window.cancelAnimationFrame(scrollTimeout);
    }
    scrollTimeout = window.requestAnimationFrame(handleScroll);
});

// Initial animation for existing careers
document.addEventListener('DOMContentLoaded', function() {
    const careers = document.querySelectorAll('.career-item');
    careers.forEach((career, index) => {
        setTimeout(() => {
            career.classList.add('visible');
        }, index * 100);
    });
    
    // Initial check for scroll position
    handleScroll();
});
</script>
@endpush

@endsection