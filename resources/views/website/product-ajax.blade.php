@if(!$products->isEmpty())
@foreach ($products as $product)

    <div class="col-lg-6 menu-item filter-{{ $product->category_id }}" style="position: absolute; left: 0px; top: 0px;">
        <a href="{{ route ('single-product', $product->slug) }}">
            <img src="{{ asset('public/admin/assets/images/product') }}/{{ $product->image }}" class="menu-img" alt="">
        </a>
        <div class="menu-content">
            <a href="{{ route ('single-product', $product->slug) }}">{{ $product->name }}</a>
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
@endforeach
@else
<h2 style="text-align: center">Products Not Available</h2>
@endif
<div class="d-flex justify-content-center" style="margin-top: 5%;">
    {!! $products->links('pagination::bootstrap-4') !!}
</div>
