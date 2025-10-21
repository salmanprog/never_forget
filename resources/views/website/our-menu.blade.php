@extends('layouts.website.master')
@section('title', $page_title)
@section('meta')
<title>Our Menu || Never Forget</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
@endsection
@section('content')
<!-- ======= Main Section ======= -->
    <main id="main" class="inner-page-header-menu">

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg-img">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Our Delicious Food Menu</h2>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <?php $categories = App\Models\Category::where('status', 1)->where('parent_id', 0)->get() ?>
                        @php $count =0;  @endphp
                        @foreach($categories as $category)
                            <ul id="menu-flters">
                                @if ($count == 0)
                                <li class="filter-active" data-filter="*">ALL</li>
                                @else
                                <li style="text-transform:uppercase" data-filter=".filter-{{ $category->slug.$category->id }}">{{$category->title}}</li>
                                @endif
                            </ul>
                            @php $count++; @endphp  
                        @endforeach
                    </div>
                </div>
                    
                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($products as $product)
                    <?php $catdata = App\Models\Category::where('id', $product->category_id)->where('parent_id', 0)->first() ?>
                    @if ($product)
                        <div class="col-lg-6 menu-item filter-{{ $catdata->slug.$catdata->id }}">
                            <a href="{{ route ('single-product', $product->slug) }}">
                                <img src="{{asset('public/admin/assets/images/product')}}/{{$product->image}}" class="menu-img" alt="">
                            </a>

                            <div class="menu-content">
                                <a href="{{ route ('single-product', $product->slug) }}">{{$product->name}}</a>
                                <span>
                                    @if($product->product_price == '')
                                        <b>Variable product</b>
                                    @else
                                        <b> ${{ $product->product_price }}</b>
                                    @endif
                                </span>
                            </div>

                            <p class="menu-fav">
                                <a href="{{ route ('single-product', $product->slug) }}"><i class="bi-cart-fill"></i></a>
                                <a href="#"><i class="bi-heart-fill"></i></a>
                            </p>

                            <div class="menu-ingredients">
                                {!! $product->short_description !!}
                            </div>

                        </div>
                    @endif
                    @endforeach 
                </div>
        
            </div>
        </section>
        <!-- End Menu Section -->
    </main>
    <!-- End #main -->	
@endSection