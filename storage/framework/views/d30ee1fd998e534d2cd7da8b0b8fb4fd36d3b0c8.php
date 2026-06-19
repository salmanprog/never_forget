
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
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="5">Enquiry detail</th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Specify type</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo e($greetingsEnquiry->user_name); ?></td>
                                    <td><?php echo e($greetingsEnquiry->email); ?></td>
                                    <td><?php echo e($greetingsEnquiry->phone); ?></td>
                                    <td><?php echo e($greetingsEnquiry->specify_type ?: '—'); ?></td>
                                    <td><?php echo e($greetingsEnquiry->message); ?></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="5">Products</th>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $greetingsEnquiry->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->category->title ?? ''); ?></td>
                                        <td>
                                            <?php if($item->category && $item->category->image): ?>
                                                <img src="<?php echo e(asset('/public/' . $item->category->image)); ?>"
                                                    alt=""
                                                    style="min-width: 100px; max-width: 100px; max-height: 100px">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($item->quantity); ?></td>
                                        <td colspan="2"></td>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\greetings-appreciation-enquiry\show.blade.php ENDPATH**/ ?>