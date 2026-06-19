
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1><?php echo e($page_title); ?></h1>
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
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\perfect-gift-enquiry\show.blade.php ENDPATH**/ ?>