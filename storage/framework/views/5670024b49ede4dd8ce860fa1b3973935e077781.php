<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
?>


<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <input type="hidden" id="page_url" value="<?php echo e($page_url ?? route('member.journey-expert-enquiries')); ?>">
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th width="100">Details</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    <?php echo $__env->make('website.individual-dashboard.journey-expert-enquiries-partials.table', ['enquiries' => $enquiries], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </tbody>
                            </table>
                        </div>
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
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                $('#body').html(data);
            }
        });
    });
    $(document).on('click', '.btn-toggle-enquiry-detail', function() {
        var target = $(this).data('target');
        var $row = $('#' + target);
        var expanded = $row.is(':visible');
        $row.toggle();
        $(this).attr('aria-expanded', !expanded).html(expanded ? '<i class="fa fa-chevron-down"></i> View details' : '<i class="fa fa-chevron-up"></i> Hide details');
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/website/individual-dashboard/journey-expert-enquiries.blade.php ENDPATH**/ ?>