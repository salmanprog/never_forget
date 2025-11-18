@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Product Details</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('product.index') }}" class="btn btn-primary btn-sm">View All Products</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<div class="row">
						<!-- Product Images Section -->
						<div class="col-md-4">
							<div class="product-images-section">
								<div class="main-image mb-3">
									<h4 class="section-title">Main Image</h4>
									<div class="image-container">
										@if($details->image)
											<img src="{{ asset('public/admin/assets/images/product') }}/{{ $details->image }}" 
												alt="Main Image" class="img-responsive">
										@else
											<img src="{{ asset('public/admin/assets/images/product/no-photo1.jpg') }}" 
												alt="No Image" class="img-responsive">
										@endif
									</div>
								</div>
								
								@if($details->related_images)
								<div class="related-images">
									<h4 class="section-title">Related Images</h4>
									<div class="row">
										@foreach(json_decode($details->related_images) as $image)
											<div class="col-md-6 mb-3">
												<div class="image-container">
													<img src="{{ asset('public/admin/assets/images/product') }}/{{ $image }}" 
														alt="Related Image" class="img-responsive">
												</div>
											</div>
										@endforeach
									</div>
								</div>
								@endif
							</div>
						</div>

						<!-- Product Details Section -->
						<div class="col-md-8">
							<div class="product-details-section">
								<div class="basic-info mb-4">
									<h4 class="section-title">Basic Information</h4>
									<div class="info-grid">
										<div class="info-item">
											<span class="info-label">Name:</span>
											<span class="info-value">{{ $details->name }}</span>
										</div>
										<div class="info-item">
											<span class="info-label">Category:</span>
											<span class="info-value">{{ $details->hasCategory->title ?? 'N/A' }}</span>
										</div>
										<div class="info-item">
											<span class="info-label">Product Type:</span>
											<span class="info-value">
												<span class="badge {{ $details->product_type == 1 ? 'badge-info' : 'badge-primary' }}">
													{{ $details->product_type == 1 ? 'Variable Product' : 'Simple Product' }}
												</span>
											</span>
										</div>
										<div class="info-item">
											<span class="info-label">Status:</span>
											<span class="info-value">
												<span class="badge {{ $details->status == 1 ? 'badge-success' : 'badge-danger' }}">
													{{ $details->status == 1 ? 'Active' : 'In-Active' }}
												</span>
											</span>
										</div>
									</div>
								</div>

								<div class="pricing-info mb-4">
									<h4 class="section-title">Pricing Information</h4>
									<div class="info-grid">
										@if($details->product_type == 1)
											<div class="info-item">
												<span class="info-label">Price Range:</span>
												<span class="info-value">
													From: <span class="price">${{ number_format(json_decode($details->variation_price)->from ?? 0, 2) }}</span>
													To: <span class="price">${{ number_format(json_decode($details->variation_price)->to ?? 0, 2) }}</span>
												</span>
											</div>
										@else
											<div class="info-item">
												<span class="info-label">Price:</span>
												<span class="info-value price">${{ number_format($details->product_price, 2) }}</span>
											</div>
										@endif
									</div>
								</div>

								@if($details->product_type == 1 && $details->variations)
								<div class="variations-info mb-4">
									<h4 class="section-title">Product Variations</h4>
									<div class="table-responsive">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Variation</th>
													<th>Price</th>
													<th>Image</th>
												</tr>
											</thead>
											<tbody>
												@foreach(json_decode($details->variations) as $variation)
													<tr>
														<td>
															@php
																$var = App\Models\Variations::find($variation->variation_id);
															@endphp
															{{ $var->name ?? 'N/A' }}
														</td>
														<td class="price">${{ number_format($variation->price, 2) }}</td>
														<td>
															@if($variation->image)
																<img src="{{ asset('public/admin/assets/images/product/variations') }}/{{ $variation->image }}" 
																	alt="Variation Image" class="variation-image">
															@else
																<span class="badge badge-danger">No Image</span>
															@endif
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								@endif

								<div class="description-info">
									<h4 class="section-title">Product Description</h4>
									<div class="info-grid">
										<div class="info-item full-width">
											<span class="info-label">Short Description:</span>
											<div class="info-value description">
												@if($details->short_description)
													{!! $details->short_description !!}
												@else
													<span class="text-muted">No short description available</span>
												@endif
											</div>
										</div>
										<div class="info-item full-width">
											<span class="info-label">Description:</span>
											<div class="info-value description">
												@if($details->description)
													{!! $details->description !!}
												@else
													<span class="text-muted">No description available</span>
												@endif
											</div>
										</div>
									</div>
								</div>

								@php
									$relatedProducts = $details->related_product ? json_decode($details->related_product) : [];
									$hasRelatedProducts = !empty($relatedProducts) && is_array($relatedProducts);
								@endphp

								@if($hasRelatedProducts)
								<div class="related-products-info">
									<h4 class="section-title">Related Products</h4>
									<div class="table-responsive">
										<table class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Product Name</th>
													<th>Category</th>
													<th>Price</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($relatedProducts as $relatedId)
													@php
														$relatedProduct = App\Models\Product::find($relatedId);
													@endphp
													@if($relatedProduct)
														<tr>
															<td>
																<a href="{{ route('product.show', $relatedProduct->slug) }}">
																	{{ $relatedProduct->name }}
																</a>
															</td>
															<td>{{ $relatedProduct->hasCategory->title ?? 'N/A' }}</td>
															<td class="price">
																@if($relatedProduct->product_type == 1)
																	${{ number_format(json_decode($relatedProduct->variation_price)->from ?? 0, 2) }} - 
																	${{ number_format(json_decode($relatedProduct->variation_price)->to ?? 0, 2) }}
																@else
																	${{ number_format($relatedProduct->product_price, 2) }}
																@endif
															</td>
															<td>
																<span class="badge {{ $relatedProduct->status == 1 ? 'badge-success' : 'badge-danger' }}">
																	{{ $relatedProduct->status == 1 ? 'Active' : 'In-Active' }}
																</span>
															</td>
														</tr>
													@endif
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								@endif

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@push('css')
<style>
	.section-title {
		color: #333;
		font-size: 18px;
		margin-bottom: 15px;
		padding-bottom: 10px;
		border-bottom: 2px solid #f4f4f4;
	}

	.product-images-section {
		background: #fff;
		padding: 15px;
		border-radius: 5px;
		box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	}

	.image-container {
		border: 1px solid #ddd;
		padding: 5px;
		border-radius: 5px;
		background: #fff;
		text-align: center;
        margin-bottom: 30px;
	}

	.image-container img {
		max-width: 100%;
		height: auto;
		border-radius: 3px; 
	}

	.product-details-section {
		background: #fff;
		padding: 15px;
		border-radius: 5px;
		box-shadow: 0 1px 3px rgba(0,0,0,0.1);
	}

	.info-grid {
		display: grid;
		grid-template-columns: repeat(2, 1fr);
		gap: 15px;
	}

	.info-item {
		padding: 10px;
		background: #f9f9f9;
		border-radius: 5px;
	}

	.info-item.full-width {
		grid-column: 1 / -1;
	}

	.info-label {
		font-weight: 600;
		color: #666;
		display: block;
		margin-bottom: 5px;
	}

	.info-value {
		color: #333;
	}

	.price {
		color: #28a745;
		font-weight: 600;
	}

	.description {
		min-height: 100px;
		max-height: 300px;
		overflow-y: auto;
		padding: 15px;
		background: #fff;
		border: 1px solid #eee;
		border-radius: 5px;
	}

	.text-muted {
		color: #6c757d;
		font-style: italic;
	}

	.variation-image {
		max-width: 50px;
		height: auto;
		border-radius: 3px;
	}

	.badge {
		padding: 5px 10px;
		font-size: 12px;
	}

	.table {
		margin-bottom: 0;
	}

	.table th {
		background: #f8f9fa;
	}

	.related-products-info {
		margin-top: 20px;
	}

	.related-products-info .table {
		margin-top: 10px;
	}

	.related-products-info a {
		color: #007bff;
		text-decoration: none;
	}

	.related-products-info a:hover {
		text-decoration: underline;
	}
</style>
@endpush

@endsection
