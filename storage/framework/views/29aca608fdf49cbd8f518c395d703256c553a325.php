<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } else {
        $layout = 'layouts.company.app';
    }
?>


<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <div class="content-header-left">
            <h1>Show Order Details</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route('order.index')); ?>" class="btn btn-primary btn-sm">View All</a>
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
                                <td><?php echo e($model->hasCustomer->first_name); ?> <?php echo e($model->hasCustomer->last_name); ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo e($model->hasCustomer->email); ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?php echo e($model->hasCustomer->phone ?? 'Not Provided'); ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo e($model->hasCustomer->address ?? 'Not Provided'); ?></td>
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
                                <?php ($counter = 0); ?>
                                <?php $__currentLoopData = $model->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$counter); ?>.</td>
                                        <td><?php echo e($product->name); ?></td>
                                        <td>
                                            <?php if($product->image): ?>
                                                <img src="<?php echo e(asset('public/admin/assets/images/product/' . $product->image)); ?>"
                                                    alt="Product Image" style="height:100px; width:150px;">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/admin/assets/images/product/no-photo1.jpg')); ?>"
                                                    alt="No Image" style="height:100px; width:150px;">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($product->variation_id): ?>
                                                <?php $variation = App\Models\Variations::where('id', $product->variation_id)->first(); ?>
                                                <?php if($variation): ?>
                                                    <?php echo e($variation->name); ?>

                                                <?php else: ?>
                                                    <span class="badge badge-danger">No Variation</span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span class="badge badge-danger">No Variation</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(number_format($product->price, 2)); ?></td>
                                        <td><?php echo e($product->quantity); ?></td>
                                        <td><?php echo e(number_format($product->price * $product->quantity, 2)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <td><?php echo e($model->order_number); ?></td>
                                    <td><?php echo e($model->created_at->format('d-m-Y H:i A')); ?></td>
                                    <td>
                                        <?php if($model->order_status == 'Pending'): ?>
                                            <span class="badge label-info">Pending</span>
                                        <?php elseif($model->order_status == 'Delivered'): ?>
                                            <span class="badge label-warning">Delivered</span>
                                        <?php elseif($model->order_status == 'Completed'): ?>
                                            <span class="badge label-success">Completed</span>
                                        <?php elseif($model->order_status == 'Canceled'): ?>
                                            <span class="badge label-danger">Canceled</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($model->payment_status); ?></td>
                                    <td><?php echo e(number_format($model->total_amount, 2)); ?></td>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/admin/order/show.blade.php ENDPATH**/ ?>