@extends('layouts.website.master') 

@section('title', 'Business Cards - Professional Design & Printing')

@section('content')
<div class="business-card-page min-h-screen">
    <!-- Hero Section -->
    <div class="hero-section py-16" style="background: linear-gradient(135deg, var(--primary-theme) 0%, var(--light-theme) 100%);">
        <div class="container mx-auto px-4">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Professional Business Cards</h1>
                <p class="text-xl md:text-2xl mb-8">Create stunning business cards in minutes. Professional quality, fast delivery, guaranteed satisfaction.</p>
                
                <!-- CTA Button -->
                <div class="flex flex-col md:flex-row gap-4 justify-center items-center mb-12">
                    <a href="{{ route('business-cards.create') }}" 
                       class="btn-cta px-8 py-4 rounded-lg text-lg font-bold transition-all duration-300 transform hover:scale-105"
                       style="background-color: var(--secondry-theme); color: white; box-shadow: 0 10px 25px rgba(207, 164, 12, 0.3);">
                        <i class="fas fa-plus me-3"></i>Create Your Business Card
                    </a>
                    <a href="{{ route('business-cards.order') }}" 
                       class="btn-secondary px-6 py-4 rounded-lg text-lg font-medium transition-all duration-300 border-2"
                       style="border-color: rgba(255,255,255,0.5); color: white; background-color: rgba(255,255,255,0.1);">
                        <i class="fas fa-upload me-3"></i>Upload Existing Design
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                    <div class="bg-white bg-opacity-20 rounded-lg p-6 backdrop-blur-sm">
                        <div class="text-3xl font-bold text-yellow-300 mb-2">Starting $25</div>
                        <p class="text-sm opacity-90">100 Premium Business Cards</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-6 backdrop-blur-sm">
                        <div class="text-3xl font-bold text-yellow-300 mb-2">24-48hr</div>
                        <p class="text-sm opacity-90">Fast Delivery</p>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-6 backdrop-blur-sm">
                        <div class="text-3xl font-bold text-yellow-300 mb-2">100%</div>
                        <p class="text-sm opacity-90">Satisfaction Guaranteed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="how-it-works py-16" style="background-color: var(--section-bg);">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4" style="color: var(--primary-theme);">How It Works</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Simple 3-step process to get your professional business cards</p>
    </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="relative mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4"
                             style="background-color: var(--primary-theme); color: white; font-size: 24px; font-weight: bold;">
                            1
                        </div>
                        <div class="absolute top-10 left-1/2 transform translate-x-8 hidden md:block">
                            <div class="w-16 h-0.5 bg-gray-300"></div>
                </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-3" style="color: var(--primary-theme);">
                        <i class="fas fa-edit me-2" style="color: var(--secondry-theme);"></i>Design
                    </h3>
                    <p class="text-gray-600">Create your business card online with our easy-to-use designer. Add your information, logo, and customize colors.</p>
            </div>
            
                <!-- Step 2 -->
                <div class="text-center">
                    <div class="relative mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4"
                             style="background-color: var(--secondry-theme); color: white; font-size: 24px; font-weight: bold;">
                            2
                        </div>
                        <div class="absolute top-10 left-1/2 transform translate-x-8 hidden md:block">
                            <div class="w-16 h-0.5 bg-gray-300"></div>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold mb-3" style="color: var(--primary-theme);">
                        <i class="fas fa-shopping-cart me-2" style="color: var(--secondry-theme);"></i>Order
                    </h3>
                    <p class="text-gray-600">Choose your paper stock, corner style, and quantity. Add to cart with secure checkout.</p>
                        </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="relative mb-6">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4"
                             style="background-color: var(--light-theme); color: white; font-size: 24px; font-weight: bold;">
                            3
                    </div>
                </div>
                    <h3 class="text-xl font-semibold mb-3" style="color: var(--primary-theme);">
                        <i class="fas fa-shipping-fast me-2" style="color: var(--secondry-theme);"></i>Receive
                    </h3>
                    <p class="text-gray-600">Get your professionally printed business cards delivered fast with tracking.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4" style="color: var(--primary-theme);">Why Choose Us?</h2>
                <p class="text-lg text-gray-600">Professional quality business cards with exceptional service</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="feature-card text-center bg-gray-50 rounded-lg p-6 hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: var(--secondry-theme);">
                        <i class="fas fa-paint-brush text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2" style="color: var(--primary-theme);">Easy Design</h3>
                    <p class="text-gray-600">Simple, intuitive design editor that anyone can use</p>
                </div>
                <div class="feature-card text-center bg-gray-50 rounded-lg p-6 hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: var(--primary-theme);">
                        <i class="fas fa-shipping-fast text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2" style="color: var(--primary-theme);">Fast Delivery</h3>
                    <p class="text-gray-600">Get your business cards delivered in 24-48 hours</p>
                </div>
                <div class="feature-card text-center bg-gray-50 rounded-lg p-6 hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: var(--light-theme);">
                        <i class="fas fa-award text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2" style="color: var(--primary-theme);">Quality Guaranteed</h3>
                    <p class="text-gray-600">100% satisfaction guarantee or we'll reprint free</p>
            </div>
        </div>
    </div>
</div>

    <!-- CTA Section -->
    <div class="cta-section py-16" style="background: linear-gradient(135deg, var(--secondry-theme) 0%, #e6b800 100%);">
        <div class="container mx-auto px-4 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Create Your Business Cards?</h2>
            <p class="text-xl mb-8 opacity-90">Join thousands of professionals who trust us with their business cards</p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="{{ route('business-cards.create') }}" 
                   class="btn-primary px-8 py-4 rounded-lg text-lg font-bold transition-all duration-300 transform hover:scale-105"
                   style="background-color: var(--primary-theme); color: white;">
                    <i class="fas fa-rocket me-3"></i>Start Creating Now
                </a>
                <a href="{{ route('business-cards.order') }}" 
                   class="btn-secondary px-6 py-4 rounded-lg text-lg font-medium transition-all duration-300 border-2 border-white text-white hover:bg-white hover:text-gray-800">
                    <i class="fas fa-upload me-3"></i>Upload Design
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style scoped>
    .btn-primary:hover {
        box-shadow: 0 15px 35px rgba(8, 30, 55, 0.3);
    }
    
    .btn-secondary:hover {
        background-color: white !important;
        color: var(--primary-theme) !important;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
    }
    
    .hero-section p {
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 0;
        }
        
        .hero-section h1 {
            font-size: 2.5rem;
        }
        
        .hero-section p {
            font-size: 1.2rem;
        }
        
        .btn-cta, .btn-primary {
            padding: 12px 24px;
            font-size: 1rem;
        }
    }
    
    @media (max-width: 480px) {
        .hero-section h1 {
            font-size: 2rem;
        }
        
        .grid.md\\:grid-cols-3 {
            gap: 1.5rem;
        }
        
        .btn-cta, .btn-primary {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
    }
</style>
@endpush
