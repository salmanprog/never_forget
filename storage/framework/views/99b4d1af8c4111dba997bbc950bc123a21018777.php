<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startPush('css'); ?>
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
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('product.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Products</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-create')): ?>
        <div class="content-header-right">
			<?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <a href="<?php echo e(route('product.create')); ?>" class="btn btn-primary btn-sm">Add Product</a>
        </div>
	<?php endif; ?>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('status')): ?>
				<div class="callout callout-success">
					<?php echo e(session('status')); ?>

				</div>
			<?php endif; ?>

			<div class="box box-info">
				<div class="box-body">
                    <div class="row" style="margin-bottom: 10px;">
                        
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
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->slug); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>
									<td>
										<?php if($model->image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/product/'.$model->image)); ?>" alt="" style="width:80px;">
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/images/product/no-photo1.jpg')); ?>" style="width:80px;">
										<?php endif; ?>
									</td>
									<td><?php echo \Illuminate\Support\Str::limit($model->name,40); ?></td>
									<td><?php echo e($model->hasCategory ? $model->hasCategory->title : 'N/A'); ?></td> 
									<td>
										<?php if($model->product_type == 1): ?>
											<span class="label label-yellow">Variable Product</span>
										<?php else: ?>
											<span class="label label-blue">Simple Product</span>
										<?php endif; ?>
									</td>
									<td>
										<?php if($model->product_type == 0): ?>
											$<?php echo e(number_format($model->product_price, 2)); ?>

										<?php else: ?>
											<?php
												$priceRange = json_decode($model->variation_price);
												if ($priceRange && isset($priceRange->from) && isset($priceRange->to)) {
													echo '$' . number_format($priceRange->from, 2) . ' – $' . number_format($priceRange->to, 2);
												} else {
													echo 'N/A';
												}
											?>
										<?php endif; ?>
									</td> 
									<td>
										<?php if($model->status): ?>
											<span class="badge label-success">Active</span>
										<?php else: ?>
											<span class="badge label-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td> 
										<a href="<?php echo e(route('product.show', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Show product" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-edit')): ?>
											<a href="<?php echo e(route('product.edit', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit product" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->slug); ?>" data-del-url="<?php echo e(url('product', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Delete product"><i class="fa fa-trash"></i></button>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="9">
								 	Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $models->links('pagination::bootstrap-4'); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\product\index.blade.php ENDPATH**/ ?>