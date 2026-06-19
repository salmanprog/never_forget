<input type="hidden" name="billing_address_id" value="<?php echo e($billing_address->id); ?>">
<div class="row">
    <table class="table">
        <tbody>
            <tr>
                <th>Name</th>
                <td><?php echo e($billing_address->first_name); ?> <?php echo e($billing_address->last_name); ?></td>
            </tr>
            <tr>
                <th>Company</th>
                <td><?php echo e($billing_address->company); ?></td>
            </tr>
            <tr>
                <th>Country / Region</th>
                <td><?php echo e($billing_address->country); ?></td>
            </tr>
            <tr>
                <th>Street address</th>
                <td><?php echo e($billing_address->street); ?></td>
            </tr>
            <tr>
                <th>Town / City</th>
                <td><?php echo e($billing_address->town); ?></td>
            </tr>
            <tr>
                <th>Postcode / ZIP</th>
                <td><?php echo e($billing_address->postcode); ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo e($billing_address->phone); ?></td>
            </tr>
            <tr>
                <th>Email address</th>
                <td><?php echo e($billing_address->email); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\billing-address-details.blade.php ENDPATH**/ ?>