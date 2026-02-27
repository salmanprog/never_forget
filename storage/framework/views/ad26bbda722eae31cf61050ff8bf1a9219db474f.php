<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
?>

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <input type="hidden" id="page_url" value="<?php echo e(route('member.business-card-orders')); ?>">
    <section class="content-header">
        <div class="content-header-left">
            <h1><?php echo e($page_title); ?></h1>
        </div>
        <div class="content-header-right">
            <input type="text" id="search" class="form-control" placeholder="Search by Order No#" style="max-width: 220px;">
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
                                        <th>SL</th>
                                        <th>Order No#</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    <?php echo $__env->make('website.individual-dashboard.business-card-orders-partials.table', ['models' => $models], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    $('#search').on('keyup', function(e) {
        if (e.which === 13) {
            var url = $('#page_url').val() + '?search=' + encodeURIComponent($(this).val());
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#body').html(data);
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/website/individual-dashboard/business-card-orders.blade.php ENDPATH**/ ?>