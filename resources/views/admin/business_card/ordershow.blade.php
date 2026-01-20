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
            <h1>BusinessCard Details</h1>
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
                        <!-- Products Section -->
                        <div class="section-title" style="color: #cfa40c;">
                            <i class="fa fa-arrow-right"></i> Products
                        </div>
                        <table class="table table-bordered">
                            @foreach ($model->hasOrderDetails as $product)
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $product->businessCard->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $product->businessCard->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $product->businessCard->phone ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td>{{ $product->businessCard->website ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $product->businessCard->address ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Font</th>
                                    <td>{{ $product->businessCard->text_font ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                    <td>{{ $product->businessCard->text_color ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Shape</th>
                                    <td>{{ $product->businessCard->card_shape ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Card Orientation</th>
                                    <td>{{ $product->businessCard->card_orientation ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Card Weight</th>
                                    <td>{{ $product->businessCard->card_weight ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Text Alignment</th>
                                    <td>{{ $product->businessCard->text_alignment ?? 'Not Provided' }}</td>
                                </tr>
                                <tr>
                                    <th>Front</th>
                                    <td>
                                        @if (!empty($product->businessCard) && !empty($product->businessCard->card_front_image))
                                            <img src="{{ asset('public/' . $product->businessCard->card_front_image) }}"
                                                alt="Product Image" style="height:100px; width:150px;">
                                        @else
                                            <img src="{{ asset('public/admin/assets/images/product/no-photo1.jpg') }}"
                                                alt="No Image" style="height:100px; width:150px;">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Back</th>
                                    <td>
                                        @if (!empty($product->businessCard) && !empty($product->businessCard->card_back_image))
                                            <img src="{{ asset('public/admin/assets/images/product/' . $product->businessCard->card_back_image) }}"
                                                alt="Product Image" style="height:100px; width:150px;">
                                        @else
                                            <img src="{{ asset('public/admin/assets/images/product/no-photo1.jpg') }}"
                                                alt="No Image" style="height:100px; width:150px;">
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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
