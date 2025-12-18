@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } else {
        $layout = 'layouts.company.app';
    }
@endphp

@extends($layout)
@section('title', $page_title)
@section('content')

    <section class="content-header">
        <div class="content-header-left">
            <h1>Show Order Details</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route('order.index') }}" class="btn btn-primary btn-sm">View All</a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <!-- Customer Info Section -->
                        <div class="section-title" style="color: #cfa40c;">
                            <i class="fa fa-arrow-right"></i> Customer Info
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{ $model->hasCustomer->first_name }} {{ $model->hasCustomer->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $model->hasCustomer->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $model->hasCustomer->phone ?? 'Not Provided' }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>
                                    @if($model->hasBillingAddress)
                                        <strong>Street: </strong> {{ $model->hasBillingAddress->street }}<br>
                                        <strong>City: </strong> {{ $model->hasBillingAddress->town }}<br>
                                        <strong>Country: </strong> {{ $model->hasBillingAddress->country }}<br>
                                        <strong>Postcode: </strong> {{ $model->hasBillingAddress->postcode }}
                                    @else
                                        <span class="text-danger">Not Provided</span>
                                    @endif
                                </td>
                            </tr>
                        </table>



                        <!-- Products Section -->
                        <div class="section-title" style="color: #cfa40c;">
                            <i class="fa fa-arrow-right"></i> Products
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Variation</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($counter = 0)
                                @foreach ($model->hasOrderDetails as $product)

                                    <tr>
                                        <td>{{ ++$counter }}.</td>
                                        <td>{{ $product->product_slug }}</td>
                                        <td>
                                            @if ($product->productsItem->image)
                                                <img src="{{ asset('public/admin/assets/images/product/' . $product->productsItem->image) }}"
                                                    alt="Product Image" style="height:100px; width:150px;">
                                            @else
                                                <img src="{{ asset('public/admin/assets/images/product/no-photo1.jpg') }}"
                                                    alt="No Image" style="height:100px; width:150px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->variation_id)
                                                <?php $variation = App\Models\Variations::where('id', $product->variation_id)->first(); ?>
                                                @if ($variation)
                                                    {{ $variation->name }}
                                                @else
                                                    <span class="badge badge-danger">No Variation</span>
                                                @endif
                                            @else
                                                <span class="badge badge-danger">No Variation</span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($product->price, 2) }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ number_format($product->price * $product->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Order Info Section -->
                        <div class="section-title" style="color: #cfa40c;">
                            <i class="fa fa-arrow-right"></i> Order Info
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order No#</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Total Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $model->order_number }}</td>
                                    <td>{{ $model->created_at->format('d-m-Y H:i A') }}</td>
                                    <td>
                                        @if ($model->order_status == 'Pending')
                                            <span class="badge label-info">Pending</span>
                                        @elseif($model->order_status == 'Delivered')
                                            <span class="badge label-warning">Delivered</span>
                                        @elseif($model->order_status == 'Completed')
                                            <span class="badge label-success">Completed</span>
                                        @elseif($model->order_status == 'Canceled')
                                            <span class="badge label-danger">Canceled</span>
                                        @endif
                                    </td>
                                    <td>{{ $model->payment_status }}</td>
                                    <td>{{ number_format($model->total_amount, 2) }}</td>
                                </tr>
                            </tbody>
                            {{-- <tr>
                                <th>Order No#</th>
                                <td>{{ $model->order_number }}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{ $model->created_at->format('d-m-Y H:i A') }}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>

                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{ $model->payment_status }}</td>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                <td>{{ number_format($model->total_amount, 2) }}</td>
                            </tr> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('.editor_short').summernote({
                height: 150
            });
        });
    </script>
@endsection
