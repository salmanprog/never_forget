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
					<table id="" class="table table-bordered table-striped">
						<tbody id="body">
                            <tr>
                                <th colspan="2"><i class="fa fa-arrow-right"></i> Customer Info</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $model->hasCustomer->first_name }} {{ $model->hasCustomer->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $model->hasCustomer->email }}</td>
                            </tr>
                            <tr>
                                <th colspan="2"><i class="fa fa-arrow-right"></i> Order Info</th>
                            </tr>
                            <tr>
                                <th>Order No#</th>
                                <td>{{ $model->order_number }}</td>
                            </tr>
                            <tr>
                                <th>Payment</th>
                                <td>{{ number_format($model->total_amount, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{ $model->payment_status }}</td>
                            </tr>
                            <tr>
                                <th colspan="2"><i class="fa fa-arrow-right"></i> Products</th>
                            </tr>
                            <tr>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Product</th>
                                            <th>Image</th>
                                            <th>Variation</th>
                                            <th>Price</th>
                                            <th>Quantities</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($counter=0)
                                        @foreach ($model->hasOrderDetails as $product)
                                            <tr>
                                                <td>{{ ++$counter }}.</td>
                                                <td>
                                                    {{ $product->name }}
                                                </td>
                                                <td> 
                                                    @if($product->image)
                                                        <img  src="{{ asset('public/admin/assets/images/product') }}/{{ $product->image }}" alt="Preview" style="height:100px; width:150px">
                                                    @else
                                                    <img src="{{ asset('public/admin/assets/images/product/no-photo1.jpg') }}" alt="Preview" style="height:100px; width:150px">
                                                    @endif
                                                </td> 
                                                
                                                <td>
                                                    @if($product->variation_id)
                                                        <?php $variation = App\Models\Variations::where('id',$product->variation_id)->first(); ?>
                                                        @if($variation)
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
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </tr>
						</tbody>
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
