@extends('layouts.admin.app')
@section('title', $page_title)
@push('css')
<style>
    .label {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    .label-yellow {
        background-color: #ffc700;
        color: #000;
    }
    .label-blue {
        background-color: #00234b;
        color: #fff;
    }
</style>
@endpush
@section('content')
<input type="hidden" id="page_url" value="{{ route('product.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Products</h1>
	</div>
	@can('product-create')
        <div class="content-header-right">
            <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Add Product</a>
        </div>
	@endcan
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('status'))
				<div class="callout callout-success">
					{{ session('status') }}
				</div>
			@endif

			<div class="box box-info">
				<div class="box-body">
                    <div class="row" style="margin-bottom: 10px;">
                        {{-- <div class="col-sm-1">Search:</div> --}}
                        <div class="d-flex col-sm-8">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="30">SL</th>
								<th>Image</th>
								<th>Name</th>
								<th>Categories</th> 
								<th>Product Type</th>
								<th>Product Price</th> 
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->slug }}">
									<td>{{ $models->firstItem()+$key }}.</td>
									<td>
										@if($model->image)
											<img src="{{ asset('public/admin/assets/images/product/'.$model->image) }}" alt="" style="width:80px;">
										@else
											<img src="{{ asset('public/admin/assets/images/product/no-photo1.jpg') }}" style="width:80px;">
										@endif
									</td>
									<td>{!! \Illuminate\Support\Str::limit($model->name,40) !!}</td>
									<td>{{ $model->hasCategory ? $model->hasCategory->title : 'N/A' }}</td> 
									<td>
										@if($model->product_type == 1)
											<span class="label label-yellow">Variable Product</span>
										@else
											<span class="label label-blue">Simple Product</span>
										@endif
									</td>
									<td>
										@if($model->product_type == 0)
											${{ number_format($model->product_price, 2) }}
										@else
											@php
												$priceRange = json_decode($model->variation_price);
												if ($priceRange && isset($priceRange->from) && isset($priceRange->to)) {
													echo '$' . number_format($priceRange->from, 2) . ' – $' . number_format($priceRange->to, 2);
												} else {
													echo 'N/A';
												}
											@endphp
										@endif
									</td> 
									<td>
										@if($model->status)
											<span class="badge label-success">Active</span>
										@else
											<span class="badge label-danger">In-Active</span>
										@endif
									</td>
									<td> 
										<a href="{{route('product.show', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Show product" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                        @can('product-edit')
											<a href="{{route('product.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit product" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a>
										@endcan
										@can('product-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->slug }}" data-del-url="{{ url('product', $model->slug) }}" data-toggle="tooltip" data-placement="top" title="Delete product"><i class="fa fa-trash"></i></button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="9">
								 	Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
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
<script>
    $(document).ready(function() {
        // ... existing code ...

        // Update the product type and price display after form submission
        $('form').on('submit', function() {
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    // Reload the page to show updated data
                    location.reload();
                },
                error: function(xhr) {
                    // Handle errors if needed
                    console.log(xhr.responseText);
                }
            });
            return false;
        });
    });
</script>
@endpush
