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
            <h1>BusinessCard Details</h1>
        </div>
        <div class="content-header-right">
            <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                            <?php $__currentLoopData = $model->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th>Name</th>
                                    <td><?php echo e($product->businessCard->name); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo e($product->businessCard->email); ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?php echo e($product->businessCard->phone ?? 'Not Provided'); ?></td>
                                </tr>
                                <tr>
                                    <th>Website</th>
                                    <td><?php echo e($product->businessCard->website ?? 'Not Provided'); ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?php echo e($product->businessCard->address ?? 'Not Provided'); ?></td>
                                </tr>
                                <tr>
                                    <th>Font</th>
                                    <td><?php echo e($product->businessCard->text_font ?? 'Not Provided'); ?></td>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                    <td><?php echo e($product->businessCard->text_color ?? 'Not Provided'); ?></td>
                                </tr>
                                <tr>
                                    <th>Shape</th>
                                    <td><?php echo e($product->businessCard->card_shape ?? 'Not Provided'); ?></td>
                                </tr>
                                <tr>
                                    <th>Card Orientation</th>
                                    <td><?php echo e($product->businessCard->card_orientation ?? 'Not Provided'); ?></td>
                                </tr>
                                <tr>
                                    <th>Card Weight</th>
                                    <td><?php echo e($product->businessCard->card_weight ?? 'Not Provided'); ?></td>
                                </tr>
                                <tr>
                                    <th>Text Alignment</th>
                                    <td><?php echo e($product->businessCard->text_alignment ?? 'Not Provided'); ?></td>
                                </tr>
                                <tr>
                                    <th>Card Front</th>
                                    <td>
                                        <?php if(!empty($product->businessCard) && !empty($product->businessCard->card_front_image)): ?>
                                            <img src="<?php echo e(asset('public/storage/' . $product->businessCard->card_front_image)); ?>"
                                                alt="Product Image" style="height:100px; width:150px;">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('public/admin/assets/images/product/no-photo1.jpg')); ?>"
                                                alt="No Image" style="height:100px; width:150px;">
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Card Back</th>
                                    <td>
                                        <?php if(!empty($product->businessCard) && !empty($product->businessCard->card_back_image)): ?>
                                            <img src="<?php echo e(asset('public/storage/' . $product->businessCard->card_back_image)); ?>"
                                                alt="Product Image" style="height:100px; width:150px;">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('public/admin/assets/images/product/no-photo1.jpg')); ?>"
                                                alt="No Image" style="height:100px; width:150px;">
                                        <?php endif; ?>
                                    </td>
                                </tr>   
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\business_card\ordershow.blade.php ENDPATH**/ ?>