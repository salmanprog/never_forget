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

{{-- @section('title', $page_title) --}}
@section('content')
<input type="hidden" id="page_url" value="{{ route('wishlist.index') }}">
    <section class="content-header">
        <div class="content-header-left">
            <h1>Wishlist / Favorites</h1>
        </div>
        @can('order-create')
            <div class="content-header-right">
                {{-- <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm">Add order</a> --}}
            </div>
        @endcan
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="row" style="margin-bottom:10px">
                            <div class="d-flex col-sm-12">
                                <input type="text" id="search" class="form-control" placeholder="Search by Order No#">
                            </div>
                            <div class="d-flex col-sm-4" style="display: none">
                                <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                    <option value="All" selected>Search by status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <table id="" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($wishlists as $key=>$wishlist)
                                    <tr id="id-{{ $wishlists->firstItem()+$key }}">
                                        <td>{{ $wishlist->product->name }}</td>
                                        <td>{{ $wishlist->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('single-product', $wishlist->product->slug) }}"
                                                class="btn btn-primary btn-xs" target="_blank">
                                                <i class="fa-regular fa-eye"></i> <span class="ms-2">View</span>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-xs wishlist-btn"
                                                data-product-id="{{ $wishlist->product_id }}">
                                                <i class="fa fa-trash"></i> <span class="ms-2">Remove</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7">
									Displying {{$wishlists->firstItem()}} to {{$wishlists->lastItem()}} of {{$wishlists->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $wishlists->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    @include('components.wishlist')
@endpush
