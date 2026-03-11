
<?php if(session('upgrade_required') && session('upgrade_url')): ?>
    <div class="callout callout-warning">
        <h4><i class="icon fa fa-exclamation-triangle"></i> Limit reached</h4>
        <p class="mb-2">You have reached your default limit of 10 employees and 5 clients. To add more, please upgrade your package. To upgrade, go to your dashboard settings.</p>
        <p class="mb-0">
            <a href="<?php echo e(session('upgrade_url')); ?>" class="btn btn-primary">
                <i class="fa fa-arrow-up"></i> Upgrade Package
            </a>
        </p>
    </div>
<?php endif; ?>


<?php if(isset($employeeCount) && isset($clientCount) && isset($limits)): ?>
    <?php
        $employeesAtLimit = $employeeCount >= $limits['employees'];
        $clientsAtLimit = $clientCount >= $limits['clients'];
    ?>
    <?php if($employeesAtLimit || $clientsAtLimit): ?>
        <div class="callout callout-info">
            <h4><i class="icon fa fa-info-circle"></i> Resource limits</h4>
            <p class="mb-2">You have reached your default limit of <?php echo e($limits['employees']); ?> employees and <?php echo e($limits['clients']); ?> clients. To add more, please upgrade your package. To upgrade, go to your dashboard settings.</p>
            <p class="mb-0">
                <a href="<?php echo e(route('company.package-upgrade')); ?>" class="btn btn-success">
                    <i class="fa fa-arrow-up"></i> Upgrade Package
                </a>
            </p>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\never-forget\resources\views/includes/upgrade_alert.blade.php ENDPATH**/ ?>