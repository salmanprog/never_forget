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
<input type="hidden" id="page_url" value="{{ route('business-card.orders') }}">
    <section class="content-header">
        <div class="content-header-left">
            <h1>All Business Card Orders</h1>
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
                                    <th>SL</th>
                                    <th>Order No#</th>
                                    <th>Product </th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    @if (Auth::user()->hasRole('Admin'))
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($models as $key => $model)
                                    <tr id="id-{{ $model->slug }}">
                                        <td>{{ $models->firstItem() + $key }}.</td>

                                        <td width="80px">{{ $model->order_number }}</td>
										<td>
											@foreach ($model->hasOrderDetails as $orderDetail)
												@if ($orderDetail->productsItem)
													{{ $orderDetail->productsItem->name }} 
                                                @elseif($orderDetail->product_slug)
                                                    {{ $orderDetail->product_slug }}
												@else
													<span class="badge badge-danger">No Product</span>
												@endif
                                                <br>
											@endforeach
										</td>
                                        <td>
											@foreach ($model->hasOrderDetails as $orderDetail)
											  ${{ number_format($orderDetail->price, 2) }}<br>
											@endforeach
                                        </td>
                                        <td>{{ date('d, m-Y H:i A', strtotime($model->created_at)) }}</td>

                                        <td>
                                            <a href="{{ route('business-card-orders.ordersshow', $model->id) }}" class="btn btn-info btn-sm">
                                                View
                                            </a>
                                        </td>

                                        <td width="100px">
                                            @can('order-show')
                                                <a href="{{ route('order.show', $model->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Show order" class="btn btn-info btn-xs"><i
                                                        class="fa fa-eye"></i></a>
                                            @endcan
                                            @can('order-edit')
                                                <!-- <a href="{{ route('order.edit', $model->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Edit order" class="btn btn-primary btn-xs"><i
                                                        class="fa fa-edit"></i></a> -->
                                            @endcan
                                            @can('order-invoice')
                                                <!-- <a href="{{ route('order.invoice', ['id' => $model->id]) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Order Invoice"
                                                    class="btn btn-warning btn-xs"><i class="fa fa-file"></i></a> -->
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7">
                                        Displying {{ $models->firstItem() }} to {{ $models->lastItem() }} of
                                        {{ $models->total() }} records
                                        <div class="d-flex justify-content-center">
                                            {!! $models->links('pagination::bootstrap-4') !!}
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
@endpush
