
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
                <?php if(session('status')): ?>
                    <div class="callout callout-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <?php
                    $hasProductName = $enquiries->contains(function ($item) {
                        return !empty($item->product_name);
                    });
                ?>
                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            
                            
                            
                        </div>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <?php if($hasProductName): ?>
                                            <th>Product Name</th>
                                        <?php endif; ?>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Travel Type</th>
                                        <th>Date</th>
                                        <th>Message</th>
                                        <th width="140">Action</th>
                                        <th>Contacts</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    <?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if($hasProductName): ?>
                                                <td>
                                                    <?php echo e($enquiry->product_name ?? 'No Product'); ?>

                                                </td>
                                            <?php endif; ?>
                                            <td><?php echo e($enquiry->name); ?></td>
                                            <td><?php echo e($enquiry->email); ?></td>
                                            <td>
                                                <?php if(!$enquiry->phone): ?>
                                                    No Phone
                                                <?php endif; ?>
                                                <?php echo e($enquiry->phone); ?>

                                            </td>
                                            <td>
                                                <?php echo e($enquiry->travel_type); ?>

                                            </td>
                                            <td><?php echo e($enquiry->date); ?></td>
                                            <td>
                                                <?php if(!$enquiry->message): ?>
                                                    <span>No message</span>
                                                <?php endif; ?>
                                                <?php echo e($enquiry->message); ?>

                                            </td>
                                            
                                            <td>
                                                <a class="btn btn-info btn-sm"
                                                    href="<?php echo e(route('enquires-detail.show', $enquiry->id)); ?>">view</a>
                                            </td>
                                            <td>
                                                <div class="btn-group mts-contacts-btn-group" role="group">
                                                    <?php if($enquiry->phone): ?>
                                                        <button type="button"
                                                            class="btn btn-success btn-xs btn-open-message-modal"
                                                            title="Send Text" data-name="<?php echo e($enquiry->name); ?>"
                                                            data-last-name="<?php echo e($enquiry->last_name ?? ''); ?>"
                                                            data-phone="<?php echo e($enquiry->phone); ?>">
                                                            <i class="fa fa-comment"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if($enquiry->phone): ?>
                                                        <button type="button"
                                                            class="btn btn-primary btn-xs btn-initiate-call"
                                                            title="Make Call (Twilio)" data-phone="<?php echo e($enquiry->phone); ?>"
                                                            data-name="<?php echo e($enquiry->name); ?> <?php echo e($enquiry->last_name ?? ''); ?>">
                                                            <i class="fa fa-phone"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    <button type="button" class="btn btn-info btn-xs btn-open-email-modal"
                                                        title="Send Email" data-email="<?php echo e($enquiry->email); ?>"
                                                        data-name="<?php echo e($enquiry->name); ?> <?php echo e($enquiry->last_name ?? ''); ?>">
                                                        <i class="fa fa-envelope"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="11">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            Displaying <?php echo e($enquiries->firstItem()); ?>

                                            to <?php echo e($enquiries->lastItem()); ?>

                                            of <?php echo e($enquiries->total()); ?> records

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
        </div>
    </section>
    <?php echo $__env->make('includes.admin.mts-modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <?php echo $__env->make('includes.admin.mts-functions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#body').html(data);
                },
                error: function() {
                    console.log('Something went wrong');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/admin/enquires/index.blade.php ENDPATH**/ ?>