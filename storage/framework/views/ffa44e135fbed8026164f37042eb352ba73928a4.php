<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } else {
        $layout = 'layouts.individual.app';
    }
?>

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <input type="hidden" id="page_url" value="<?php echo e(route('my-e-card-enquiries')); ?>">
    <section class="content-header">
        <div class="content-header-left">
            <h1>E-Card Enquiry</h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="row" style="margin-bottom:10px">
                            <div class="d-flex col-sm-12">
                                <input type="text" id="search" class="form-control" placeholder="Search by Recipient, Occasion or Status">
                            </div>
                        </div>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Recipient</th>
                                    <th>Occasion</th>
                                    <th>Send Date & Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($enquiries->firstItem() + $key); ?>.</td>
                                        <td><?php echo e($enquiry->recipient_name); ?><br><small><?php echo e($enquiry->recipient_email_phone); ?></small></td>
                                        <td><?php echo e($enquiry->occasion); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($enquiry->send_date)->format('d M Y')); ?> <?php echo e(\Carbon\Carbon::parse($enquiry->send_time)->format('h:i A')); ?></td>
                                        <td>
                                            <?php if($enquiry->status == 'New Request'): ?>
                                                <span class="badge label-info">New Request</span>
                                            <?php elseif($enquiry->status == 'Waiting for Design'): ?>
                                                <span class="badge label-warning">Waiting for Design</span>
                                            <?php elseif($enquiry->status == 'Awaiting Client Approval'): ?>
                                                <span class="badge label-primary">Awaiting Client Approval</span>
                                            <?php elseif($enquiry->status == 'Ready to Send'): ?>
                                                <span class="badge label-success">Ready to Send</span>
                                            <?php elseif($enquiry->status == 'Completed'): ?>
                                                <span class="badge label-success">Completed</span>
                                            <?php else: ?>
                                                <span class="badge label-default"><?php echo e($enquiry->status); ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="5">
                                        Displaying <?php echo e($enquiries->firstItem()); ?> to <?php echo e($enquiries->lastItem()); ?> of <?php echo e($enquiries->total()); ?> records
                                        <div class="d-flex justify-content-center">
                                            <?php echo $enquiries->links('pagination::bootstrap-4'); ?>

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

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget\resources\views/admin/my-e-card-enquiries/index.blade.php ENDPATH**/ ?>