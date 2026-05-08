@extends('layouts.website.master')
@section('content')
@section('title', $page_title)

<!-- Inner Page Banner  -->
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Search Results
                @if(request('search'))
                    for "{{ request('search') }}"
                @endif
            </h1>
        </div>
    </section>
</main>

<!-- Search Results Section -->
<section class="shop-section py-5">
    <div class="container">
        @if($products->count() > 0)
            <div class="row mb-4">
                <div class="col-12">
                    <p class="text-muted">Found {{ $products->count() }} product(s)</p>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 product-item visible mb-4">
                        <div class="gift-card-wrapper">
                            <a href="{{ route('single-product', $product->slug) }}">
                                <img src="{{ asset('public/admin/assets/images/product') }}/{{ $product->image }}"
                                    alt="{{ $product->name }}" class="img-fluid">
                            </a>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="{{ route('single-product', $product->slug) }}" class="text-decoration-none">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <div class="price-rating">
                                    @if ($product->product_type == 0)
                                        <span class="price">${{ number_format($product->product_price, 2) }}</span>
                                    @else
                                        <span class="price range">
                                            @php
                                                $variations = json_decode($product->variations, true);
                                                if ($variations && count($variations) > 0) {
                                                    $prices = array_column($variations, 'price');
                                                    $minPrice = min($prices);
                                                    $maxPrice = max($prices);
                                                    echo '$' . number_format($minPrice, 2) . ' – $' . number_format($maxPrice, 2);
                                                } else {
                                                    echo 'N/A';
                                                }
                                            @endphp
                                        </span>
                                    @endif
                                    <div class="rating">
                                        <i class="fa-solid fa-star"></i>
                                        <span>4.8</span>
                                    </div>
                                </div>
                                <a href="{{ route('single-product', $product->slug) }}" class="add-to-cart">
                                    @if ($product->product_type == 0)
                                        Add To Cart
                                    @else
                                        Select Options
                                    @endif
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center py-5">
                    <h3>No products found</h3>
                    <p class="text-muted">Try searching with different keywords</p>
                    <a href="{{ route('shop') }}" class="btn primary-btn mt-3">Browse All Products</a>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
    .gift-card-wrapper {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .gift-card-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    .gift-card-wrapper img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .product-info {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }

    .product-title a {
        color: #333;
    }

    .product-title a:hover {
        color: #0B1B48;
    }

    .price-rating {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .price {
        font-size: 20px;
        font-weight: 700;
        color: #0B1B48;
    }

    .price.range {
        font-size: 18px;
    }

    .rating {
        display: flex;
        align-items: center;
        color: #F5A623;
        gap: 5px;
    }

    .rating i {
        font-size: 16px;
    }

    .rating span {
        font-weight: 600;
        font-size: 16px;
    }

    .add-to-cart {
        background: #0B1B48;
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: auto;
    }

    .add-to-cart:hover {
        background: #cfa40c;
        color: #0b1b48;
        transform: translateY(-2px);
    }

    .product-item {
        margin-bottom: 30px;
    }
</style>

@endsection

