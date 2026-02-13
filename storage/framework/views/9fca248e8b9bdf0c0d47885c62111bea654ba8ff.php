<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1><?php echo e($page_title); ?></h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Enquiry Detail</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <tr>
                                    <td><?php echo e($perfectGiftEnquiry->user_name); ?></td>
                                    <td><?php echo e($perfectGiftEnquiry->email); ?></td>
                                    <td><?php echo e($perfectGiftEnquiry->phone); ?></td>
                                    <td><?php echo e($perfectGiftEnquiry->message); ?></td>
                                    <td><?php echo e($perfectGiftEnquiry->created_at->format('d M Y')); ?></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Products</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>image</th>
                                    <th>quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $perfectGiftEnquiry->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->perfectGift->title); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset('/public/' . $item->perfectGift->images)); ?>"
                                             alt="<?php echo e($item->perfectGift->title); ?>"
                                             style="min-width: 100px; max-width: 100px; max-height: 100px">
                                    </td>
                                    <td><?php echo e($item->quantity); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget\resources\views/admin/perfect-gift-enquiry/show.blade.php ENDPATH**/ ?>