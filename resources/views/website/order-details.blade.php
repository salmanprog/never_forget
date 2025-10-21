@extends('layouts.website.master')
@section('content')
    <style>
        li {
            list-style: none;
        }

        td.price {
            display: table-cell;
            vertical-align: middle;
        }

        .mark,
        mark {
            padding: 0.2em;
            background-color: #c2ffbf;
        }
    </style>

    <!-- Inner Page Banner  -->
    <section class="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-page-heading">
                        <h1>ORDER DETAILS</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Page Banner  -->
    <section style="background: #fff">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-table mt-5">
                        <h3 class="font-weight-bold">Order Details: @if (empty($order))
                                <span class="mb-0"style="font-size: 20px;">Order #<mark>{{ $orders->order_number }}</mark>
                                    was placed on <mark>{{ $orders->order_date }}</mark> and is
                                    currently<mark>{{ $orders->order_status }}</mark> payment. </span>
                            @endif
                        </h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-top-0">Product</th>
                                    <th scope="col" class="border-top-0">Total</th>
                                </tr>
                            </thead>
                            <tbody class="border">
                                @php($counter = 0)
                                @foreach ($orders->hasOrderDetails as $product)
                                    <tr>
                                        <td>
                                            <a href="{{ route('single-product', $product->product_slug) }}"
                                                style="color: #7f032f;font-size: 18px;">{{ $product->hasProduct->name }}</a>
                                            -> Quantity: <strong>{{ $product->quantity }}</strong>

                                            <p class="prod-title" style="margin-bottom: 0px;"><?php $variations = App\Models\Variations::where('id', $product->size_id)->first(); ?>
                                                @if($product->variation_id != null)
                                                    <?php $Size = App\Models\Variations::where('id',$product->variation_id)->first(); ?>
                                                        Option:  {{ $Size->hasSizes->sizes}}
                                                @endif
                                            </p>
                                            <p class="prod-title" style="margin-bottom: 0px;">{{$product->message}}</p>
                                        </td>    
                                        <td class="price">${{ number_format($product->sub_total, 2) }}</td>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="border">
                                <tr>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col" colspan="2">${{ number_format($orders->total_amount, 2) }}</th>
                                </tr>
                                <tr>
                                    <th scope="row">Payment method:</th>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>${{ number_format($orders->total_amount, 2) }}</td>
                                </tr>
                                <tr>
                                    @if (empty($orders))
                                        <th>Note:</th>
                                        <td>{!! \Illuminate\Support\Str::limit($orders->order_note ?? 'N/A', 60) !!}</td>
                                    @endif
                                    @if (!empty($orders))
                                        <th>Note:</th>
                                        <td>{!! \Illuminate\Support\Str::limit($orders->order_note ?? 'N/A', 60) !!}</td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px">
                <div class="col-md-12">
                    <h3 class="font-weight-bold">Billing address</h3>
                    <div class="class-address border rounded">
                        <address class="pl-3 pt-3" style="padding-left:10px;">
                            @if ($address)
                                {{ $address->first_name }} {{ $address->last_name }} <br> {{ $address->company }}<br>
                                {{ $address->street }}<br>
                                {{ $address->street }}<br>{{ $address->town }}<br>{{ $address->country }}
                                <p class="m-0"> <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    {{ $address->phone }}</p>
                                <p> <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> {{ $address->email }}
                                </p>
                            @endif
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
