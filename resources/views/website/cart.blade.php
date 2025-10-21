@extends('layouts.website.master')
@section('content')
@section('title', $page_title)
        <style>
        .cart-main {
            background: #298dff38; 
            /* box-shadow: 0 2px 16px rgb(0 0 0); */
            padding: 30px 0; 
        }
        .cart-table table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .cart-table th, .cart-table td {
            padding: 16px 12px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }
        .cart-table th {
            background: #0a2749;
            font-weight: 700;
            color: #ffffff;
        }
        .cart-table tr:last-child td {
            border-bottom: none;
        }
        .cart-table tbody tr:hover {
            background: #f9f9f9;
        }
        .product_name {
            font-size: 18px;
            color: #081e37;
            font-family: 'Lato', sans-serif;
            font-weight: 600;
            margin-bottom: 0;
        }
        .remove-btn {
            border-radius: 50%;
            width: 32px;
            height: 32px;
            background: #f8d7da;
            color: #721c24;
            border: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }
        .remove-btn:hover {
            background: #dc3545;
            color: #fff;
        }
        .coupon_code, .apply_coupon {
            padding: 8px 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-right: 8px;
        }
        .apply_coupon {
            background: #0a2749;
            color: #fff;
            border: none;
            transition: background 0.2s;
        }
        .apply_coupon:hover {
            background: #cfa40c;
            color: #fff;
        }
        .golbal-btn-submit, .proceesd {
            background: #cfa40c;
            color: #fff;
            border: none;
            padding: 12px 32px;
            font-size: 17px;
            border-radius: 6px;
            transition: background 0.2s;
            margin-top: 10px;
            display: inline-block;
        }
        .golbal-btn-submit:hover, .proceesd:hover {
            background: #0a2749;
            color: #fff;
        }
        input[type='number'] {
            width: 60px;
            padding: 6px 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }
        .quantity_goods {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .quantity-btn {
            background: #cfa40c;
            border: none;
            border-radius: 4px;
            width: 28px;
            height: 28px;
            font-size: 18px;
            color: #333;
            cursor: pointer;
            transition: background 0.2s;
        }
        .quantity-btn:hover {
            background: #0a2749;
            color: #fff;
        }
        /* Chrome, Safari, Edge, Opera */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        margin: 0; 
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
        
        @media (max-width: 768px) {
            .cart-table table, .cart-table thead, .cart-table tbody, .cart-table th, .cart-table td, .cart-table tr {
                display: block;
            }
            .cart-table th {
                display: none;
            }
            .cart-table td {
                border: none;
                position: relative;
                padding-left: 50%;
                min-height: 40px;
            }
            .cart-table td:before {
                position: absolute;
                left: 12px;
                top: 16px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
                color: #888;
                content: attr(data-label);
            }
        }
        </style>
        <!-- Inner Page Banner  -->
        <main class="inner-bg">
            <section class="inner-banner">
                <div class="container">
                    <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Cart</h1>
                </div>
            </section>
        </main>
        <!-- Inner Page Banner  -->
        <section class="cart-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-of-table cart-table">
                            @if ($message = Session::get('success'))
                                <div class="p-1 mb-3 rounded bg-success" style="width: 100%; color: #fff;" id="updated-cart">
                                    <p class="text-green-800" style="margin: 0; text-align: center;">Cart Item is Updated Successfully !</p>
                                </div>
                                <script>
                                setTimeout(function () {
                                    var successMessage = document.getElementById('updated-cart');
                                    successMessage.style.display = 'none';
                                }, 5000);
                            </script>
                            @endif
                    
                            <div class="container">
                                @if(session()->has('error'))
                                <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-danger" style="border-top:2px solid red; text-align: center;" role="alert">
                                        <p><i class="fa fa-info-circle" style="color: rgb(187, 50, 50)"></i> {{ session()->get('error') }}</p>
                                        </div>
                                    </div>
                                </div>
                                @elseif(session()->has('max-error'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger" style="border-top:2px solid red; text-align: center;" role="alert">
                                            <p><i class="fa fa-info-circle" style="color: rgb(187, 50, 50)"></i> {{ session()->get('max-error') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                </div>
                                @if($cartItems->count() == 0)
                                    <div class="text-center py-5">
                                        <h3>Your cart is empty!</h3>
                                        <a href="{{ route('shop') }}" class="golbal-btn-submit mt-3">Continue Shopping</a>
                                    </div>
                                @else
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <table class="table-responsive table table-striped dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cartItems as $item)
                                                    <tr id="pro-{{ $item->id }}">
                                                        <td>
                                                            <button type="button" value="{{ $item->id }}" scope="row" class="remove-btn" ><span class="croos">x</span></button>
                                                        </td>
                                                        <td>
                                                            @if($item->attributes->product_type == 'business_card')
                                                            <img src="{{ asset('public/storage/' .$item->attributes->card_front_image) }}" style="width: 100px;">
                                                            @else
                                                            <img src="{{ asset('public/admin/assets/images/product') }}/{{ $item->attributes->product_image }}" style="width: 100px;">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <p class="product_name">{{ $item->name }}</p>
                                                            @if($item->attributes->product_type == '1')
                                                                Option: {{ $item->attributes->variation_name }}
                                                            @endif
                                                        </td>
                                                        <td>${{ number_format($item->price, 2) }}</td>
                                                        <td>
                                                            <input type="hidden" name="id[]" value="{{ $item->id }}" >
                                                            <div class="quantity_goods">
                                                                <button type="button" class="quantity-btn" onclick="this.nextElementSibling.stepDown();">-</button>
                                                                <input type="number" step="1" min="1" name="quantity[]" value="{{ $item->quantity }}" title="Qty">
                                                                <button type="button" class="quantity-btn" onclick="this.previousElementSibling.stepUp();">+</button>
                                                            </div>
                                                        </td>
                                                        <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="coupon_code" class="input-text coupon_code" id="coupon_code" value="" placeholder="Coupon code">
                                                <button type="button" class="button coupon-btn apply_coupon" name="apply_coupon" style="cursor: pointer" value="Apply coupon">Apply coupon</button>
                                                <div><span style="color: red" id="error-coupon"></span></div>
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3 right-txt last-cart-btn ">
                                                <button type="submit" class="button golbal-btn-submit" name="update_cart" style="cursor: pointer" value="Update cart" aria-disabled="false">Update cart</button>
                                            </div>
                                        </div>
                                    </form>
                    
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 Cart-totals">
                                            <h3 class="cart-totals mb-5">Cart totals</h3>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Subtotal</th>
                                                        <th scope="col" colspan="2">${{ number_format(Cart::getTotal(), 2) }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(Session::has('discount'))
                                                        <?php
                                                            $discount = Session::get('discount');
                                                        ?>
                                                        <tr>
                                                            <td>Coupon Discount</td>
                                                            <td>${{ number_format($discount['discount'], 2) }}</td>
                                                            <td>
                                                                <button title="Remove coupon" type="button" data-session="discount" class="btn btn-danger btn-sm remove-coupon-btn"><i class="fa fa-times"></i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td colspan="2">${{ number_format(Cart::getTotal()-$discount['discount'], 2) }}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>Total</td>
                                                            <td>${{ number_format(Cart::getTotal(), 2) }}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <a href="{{ route('check-out') }}" style="cursor: pointer" class="proceesd golbal-btn-submit">Proceed to checkout</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@push('js')
    <script>
        $(document).on('click', '.coupon-btn', function(){
            var coupon_code = $('#coupon_code').val();
            if(coupon_code.length==0){
                $('#error-coupon').html('Invalid coupon code.');
            }else if(coupon_code.length < 6 || coupon_code.length > 6){
                $('#error-coupon').html('Invalid coupon code.');
            }else{
                $.ajax({
                    type:"get",
                    url:"{{ url('apply_coupon') }}",
                    data:{'coupon_code':coupon_code},
                    success:function(data){
                        if(data.status=='sign'){
                            window.location.href = "{{ url('./login') }}";
                        }else if(data.status=='expired'){
                            Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'This is expired.',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }else if(data.status=='in-active'){
                            Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'This is not active.',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }else if(data.status=='used'){
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'You have used this code can not use again.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }else if(data.status=='true'){
                            $('#cart-details').html(data.cart);
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Congrates! Coupon applied successfully.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            location.reload();
                        }else if(data.status=='not-found'){
                            Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Sorry this is not matched.',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }
                    },
                    error:function (er) {
                        console.log(er);
                    }
                });
            }
        });

        $("#coupon_code").keyup(function(){
            var coupon_code = $(this).val();
            if(coupon_code.length == 6){
                $('#error-coupon').html('');
            }else{
                $('#error-coupon').html('Invalid Coupon');
                return false;
            }
        });

        $(document).on('click', '.remove-coupon-btn', function(){
            var session_key = $(this).attr('data-session');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to remove coupon?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type:"get",
                        url:"{{ url('remove-coupon') }}",
                        data:{'session_key':session_key},
                        success:function(data){
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'You have removed coupon successfully.',
                                showConfirmButton: false,
                                timer: 1500
                            })

                            location.reload();
                        },
                        error:function (er) {
                            console.log(er);
                        }
                    });
                }
            })
        });

        $(document).on('click', '.remove-btn', function(){
            var product_id = $(this).val();
            var row = $('#pro-'+product_id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : "{{ route('cart.remove') }}",
                        data : {'product_id' : product_id},
                        type : 'POST',
                        success : function(result){
                            if(result){
                                $(row).remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your item has been deleted.',
                                    'success'
                                )
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                })
                            }
                        }
                    });
                }
            })
        });
    </script>
@endpush
