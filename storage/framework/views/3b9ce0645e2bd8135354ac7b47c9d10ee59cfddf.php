
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
                        <?php
                            $hasProductName = !empty($enquiries->product_name);
                        ?>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <?php if($hasProductName): ?>
                                        <th>Product Name</th>
                                    <?php endif; ?>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <tr>
                                    <?php if($hasProductName): ?>
                                        <td><?php echo e($enquiries->product_name); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e($enquiries->name); ?></td>
                                    <td><?php echo e($enquiries->email); ?></td>
                                    <td><?php echo e($enquiries->phone); ?></td>
                                    <td><?php echo e($enquiries->message); ?></td>
                                    <td><?php echo e($enquiries->created_at->format('d M Y')); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/enquires/show.blade.php ENDPATH**/ ?>