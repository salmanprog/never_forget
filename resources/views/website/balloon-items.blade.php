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
        .edit-btn{
            border-radius: 50%;
            width: 32px;
            height: 32px;
            background: #f8d7da;
            color: #9fdba5ff;
            border: none;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }
        .edit-btn:hover {
            background: #034211ff;
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
</style>
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Balloons
            </h1>
        </div>
    </section>
</main>
<section class="cart-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-of-table cart-table">
                    <table class="table-responsive table table-striped dt-responsive nowrap">
                        @if (count($enquiries) > 0)
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        @else
                        <div class="text-center">
                            <h4>No balloon enquiry items found</h4>
                        </div>
                        @endif

                        <tbody>
                            @php
                                $item_ids = [];    
                            @endphp
                            @foreach ($enquiries as $enquiry)
                            @php
                                array_push($item_ids, $enquiry->balloon_id);
                            @endphp
                            <tr id="">
                                <td>
                                    @if ($enquiry->balloon->images)
                                        <img src="{{ asset('/public/'.$enquiry->balloon->images) }}"
                                        alt="{{ $enquiry->balloon->title }}" style="width: 100px; height: 100px;">
                                    @endif
                                </td>
                                <td>
                                    {{ $enquiry->balloon->title }}
                                </td>
                                <td>
                                    {{ $enquiry->quantity }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($enquiries) > 0)
                    <form action="{{ route('balloon.enquiry') }}" method="POST">
                        @csrf
                        <input type="hidden" name="balloon_ids" value="{{ implode(',', $item_ids) }}">
                        <textarea name="message" placeholder="Message"></textarea>
                        <button type="submit" class="golbal-btn-submit">Submit Baloon Enquiry</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
