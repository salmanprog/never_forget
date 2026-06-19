
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
                                    <th>Travel Type</th>
                                    <th>Any cruise line</th>
                                    <th>Duration</th>
                                    <th>Destination</th>
                                    <th>Country</th>
                                    <th>Amenity</th>
                                    <th>Budget</th>
                                    <th>Date</th>
                                    <th>Message</th>
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
                                    <td><?php echo e($enquiries->travel_type); ?></td>
                                    <td><?php echo e($enquiries->any_cruise_line ? $enquiries->any_cruise_line : 'N/A'); ?></td>
                                    <td>
                                        <?php echo e(getDurationName($enquiries->duration)); ?>

                                    </td>
                                    <td>
                                        <?php echo e(getDestinationName($enquiries->destination)); ?>

                                    </td>
                                    <td>
                                        <?php echo e($enquiries->country == null ? 'N/A' : getCountryName($enquiries->country)); ?>

                                    </td>
                                    <td>
                                        <?php echo e($enquiries->amenity == null ? 'N/A' : getAmenityName($enquiries->amenity)); ?>

                                    </td>
                                    <td>
                                        <?php echo e($enquiries->budget == null ? 'N/A' : getBudgetName($enquiries->budget)); ?>

                                    </td>
                                    <td><?php echo e($enquiries->date); ?></td>
                                    <td><?php echo e($enquiries->message); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\enquires\show.blade.php ENDPATH**/ ?>