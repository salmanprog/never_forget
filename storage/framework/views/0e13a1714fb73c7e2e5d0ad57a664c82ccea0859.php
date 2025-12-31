
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
                <?php if(session('status')): ?>
                    <div class="callout callout-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            <div class="d-flex col-sm-4">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                            
                            
                        </div>
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    
                                    <th>Message</th>
                                    <th width="140">Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $balloonEnquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($enquiry->user_name); ?></td>
                                        <td><?php echo e($enquiry->email); ?></td>
                                        <td>
                                            <?php if(!$enquiry->phone): ?>
                                              No Phone
                                            <?php endif; ?>
                                            <?php echo e($enquiry->phone); ?>

                                        </td>
                                        <td>
                                            <?php if(!$enquiry->message): ?>
                                                <span>No message</span>
                                            <?php endif; ?>
                                            <?php echo e($enquiry->message); ?>

                                        </td>
                                        
                                        <td>
                                            <a class="btn btn-info btn-sm" href="<?php echo e(route('balloon_enquiry.show', $enquiry->id)); ?>">view</a>
                                        </td>
                                        <td></td>
                                        <td>
                                            
                                        </td>
                                        <td width="250px">
                                            
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="11">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        Displaying <?php echo e($balloonEnquiries->firstItem()); ?>

                                        to <?php echo e($balloonEnquiries->lastItem()); ?>

                                        of <?php echo e($balloonEnquiries->total()); ?> records
                                
                                        <div class="d-flex justify-content-center">
                                            <?php echo $balloonEnquiries->links('pagination::bootstrap-4'); ?>

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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/admin/balloon-enquiry/index.blade.php ENDPATH**/ ?>