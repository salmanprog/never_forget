
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Product Details</h1>
	</div>
	<div class="content-header-right">
		<?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary btn-sm">View All Products</a>
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
										<?php if($details->image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($details->image); ?>" 
												alt="Main Image" class="img-responsive">
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/images/product/no-photo1.jpg')); ?>" 
												alt="No Image" class="img-responsive">
										<?php endif; ?>
									</div>
								</div>
								
								<?php if($details->related_images): ?>
								<div class="related-images">
									<h4 class="section-title">Related Images</h4>
									<div class="row">
										<?php $__currentLoopData = json_decode($details->related_images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div class="col-md-6 mb-3">
												<div class="image-container">
													<img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($image); ?>" 
														alt="Related Image" class="img-responsive">
												</div>
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
								<?php endif; ?>
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
											<span class="info-value"><?php echo e($details->name); ?></span>
										</div>
										<div class="info-item">
											<span class="info-label">Category:</span>
											<span class="info-value"><?php echo e($details->hasCategory->title ?? 'N/A'); ?></span>
										</div>
										<div class="info-item">
											<span class="info-label">Product Type:</span>
											<span class="info-value">
												<span class="badge <?php echo e($details->product_type == 1 ? 'badge-info' : 'badge-primary'); ?>">
													<?php echo e($details->product_type == 1 ? 'Variable Product' : 'Simple Product'); ?>

												</span>
											</span>
										</div>
										<div class="info-item">
											<span class="info-label">Status:</span>
											<span class="info-value">
												<span class="badge <?php echo e($details->status == 1 ? 'badge-success' : 'badge-danger'); ?>">
													<?php echo e($details->status == 1 ? 'Active' : 'In-Active'); ?>

												</span>
											</span>
										</div>
									</div>
								</div>

								<div class="pricing-info mb-4">
									<h4 class="section-title">Pricing Information</h4>
									<div class="info-grid">
										<?php if($details->product_type == 1): ?>
											<div class="info-item">
												<span class="info-label">Price Range:</span>
												<span class="info-value">
													From: <span class="price">$<?php echo e(number_format(json_decode($details->variation_price)->from ?? 0, 2)); ?></span>
													To: <span class="price">$<?php echo e(number_format(json_decode($details->variation_price)->to ?? 0, 2)); ?></span>
												</span>
											</div>
										<?php else: ?>
											<div class="info-item">
												<span class="info-label">Price:</span>
												<span class="info-value price">$<?php echo e(number_format($details->product_price, 2)); ?></span>
											</div>
										<?php endif; ?>
									</div>
								</div>

								<?php if($details->product_type == 1 && $details->variations): ?>
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
												<?php $__currentLoopData = json_decode($details->variations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td>
															<?php
																$var = App\Models\Variations::find($variation->variation_id);
															?>
															<?php echo e($var->name ?? 'N/A'); ?>

														</td>
														<td class="price">$<?php echo e(number_format($variation->price, 2)); ?></td>
														<td>
															<?php if($variation->image): ?>
																<img src="<?php echo e(asset('public/admin/assets/images/product/variations')); ?>/<?php echo e($variation->image); ?>" 
																	alt="Variation Image" class="variation-image">
															<?php else: ?>
																<span class="badge badge-danger">No Image</span>
															<?php endif; ?>
														</td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
									</div>
								</div>
								<?php endif; ?>

								<div class="description-info">
									<h4 class="section-title">Product Description</h4>
									<div class="info-grid">
										<div class="info-item full-width">
											<span class="info-label">Short Description:</span>
											<div class="info-value description">
												<?php if($details->short_description): ?>
													<?php echo $details->short_description; ?>

												<?php else: ?>
													<span class="text-muted">No short description available</span>
												<?php endif; ?>
											</div>
										</div>
										<div class="info-item full-width">
											<span class="info-label">Description:</span>
											<div class="info-value description">
												<?php if($details->description): ?>
													<?php echo $details->description; ?>

												<?php else: ?>
													<span class="text-muted">No description available</span>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>

								<?php
									$relatedProducts = $details->related_product ? json_decode($details->related_product) : [];
									$hasRelatedProducts = !empty($relatedProducts) && is_array($relatedProducts);
								?>

								<?php if($hasRelatedProducts): ?>
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
												<?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php
														$relatedProduct = App\Models\Product::find($relatedId);
													?>
													<?php if($relatedProduct): ?>
														<tr>
															<td>
																<a href="<?php echo e(route('product.show', $relatedProduct->slug)); ?>">
																	<?php echo e($relatedProduct->name); ?>

																</a>
															</td>
															<td><?php echo e($relatedProduct->hasCategory->title ?? 'N/A'); ?></td>
															<td class="price">
																<?php if($relatedProduct->product_type == 1): ?>
																	$<?php echo e(number_format(json_decode($relatedProduct->variation_price)->from ?? 0, 2)); ?> - 
																	$<?php echo e(number_format(json_decode($relatedProduct->variation_price)->to ?? 0, 2)); ?>

																<?php else: ?>
																	$<?php echo e(number_format($relatedProduct->product_price, 2)); ?>

																<?php endif; ?>
															</td>
															<td>
																<span class="badge <?php echo e($relatedProduct->status == 1 ? 'badge-success' : 'badge-danger'); ?>">
																	<?php echo e($relatedProduct->status == 1 ? 'Active' : 'In-Active'); ?>

																</span>
															</td>
														</tr>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
									</div>
								</div>
								<?php endif; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $__env->startPush('css'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\product\show.blade.php ENDPATH**/ ?>