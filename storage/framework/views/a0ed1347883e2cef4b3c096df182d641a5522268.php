<?php $__env->startSection('title', $page_title ?? 'Upgrade Package'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .list-unstyled li {
        margin-bottom: 20px;
    }
    .list-unstyled strong {
        margin-right: 5px;
    }
</style>
<section class="content-header">
    <div class="content-header-left">
        <h1>Upgrade Package</h1>
    </div>
    <div class="content-header-right">
        <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a href="<?php echo e(route('admin.company_employee.index')); ?>" class="btn btn-primary btn-sm">Back to Resources</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('error')): ?>
                <div class="callout callout-danger"><?php echo e(session('error')); ?></div>
            <?php endif; ?>
            <?php if(session('success')): ?>
                <div class="callout callout-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e($package['name']); ?></h3>
                </div>
                <div class="box-body">
                    <ul class="list-unstyled" style="margin-bottom: 16px;">
                        <li><i class="fa fa-users" style="color: #081e37;"></i> <strong><?php echo e($package['employees']); ?></strong> employees included</li>
                        <li><i class="fa fa-user-tie" style="color: #081e37;"></i> <strong><?php echo e($package['clients']); ?></strong> clients included</li>
                        <li class="mt-2"><strong>$<?php echo e(number_format($package['amount'], 2)); ?></strong> one-time</li>
                    </ul>
                    <p class="text-muted small" style="margin-bottom: 20px;">Pay securely within the dashboard with PayPal or Card (Authorize.net). The new limits will be applied automatically after payment.</p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#paymentModal">
                        <i class="fa fa-arrow-up"></i> Proceed to upgrade
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 1px solid #f4f4f4;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="paymentModalLabel" style="color: #081e37;">Complete upgrade — $<?php echo e(number_format($package['amount'], 2)); ?></h4>
            </div>
            <div class="modal-body">
                <?php if($billing_addresses->isEmpty()): ?>
                    <div class="alert alert-warning">Please <a href="<?php echo e(route('billing_address.create')); ?>" target="_blank">add a billing address</a> first, then refresh this page.</div>
                <?php else: ?>
                    <div class="form-group">
                        <label for="modal_billing_address">Billing address <span class="text-danger">*</span></label>
                        <select class="form-control" id="modal_billing_address" name="billing_address_id" required>
                            <?php $__currentLoopData = $billing_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($addr->id); ?>"><?php echo e(trim(implode(', ', array_filter([$addr->first_name, $addr->last_name, $addr->street, $addr->town, $addr->country]))) ?: 'Billing address'); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <p class="text-muted small" style="margin-bottom: 16px;">Total: <strong>$<?php echo e(number_format($package['amount'], 2)); ?></strong> (package only)</p>
                    <form action="<?php echo e(route('company.package-upgrade.paypal')); ?>" method="POST" style="margin-bottom: 16px;" id="paypal-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="billing_address_id" id="paypal_billing_id" value="<?php echo e($billing_addresses->first()->id ?? ''); ?>">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa-brands fa-paypal"></i> <span class="ml-10">Pay with PayPal</span></button>
                    </form>
                    <?php if(config('services.authorize.api_login_id') && config('services.authorize.client_key')): ?>
                    <p class="text-muted small" style="margin-bottom: 12px;">Or pay with card</p>
                    <div class="card-form">
                        <div class="form-group">
                            <label class="control-label">Card number</label>
                            <input type="text" id="auth-card-number" class="form-control" placeholder="4111111111111111" maxlength="19" autocomplete="off" data-accept="cardNumber">
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label">Exp. month</label>
                                    <input type="text" id="auth-exp-month" class="form-control" placeholder="MM" maxlength="2" data-accept="month">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label class="control-label">Exp. year</label>
                                    <input type="text" id="auth-exp-year" class="form-control" placeholder="YYYY" maxlength="4" data-accept="year">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">CVV</label>
                            <input type="text" id="auth-card-code" class="form-control" placeholder="123" maxlength="4" autocomplete="off" data-accept="cardCode">
                        </div>
                        <div id="authorize-errors" class="text-danger small" style="margin-bottom: 8px;"></div>
                        <form action="<?php echo e(route('company.package-upgrade.charge')); ?>" method="POST" id="card-form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="billing_address_id" id="card_billing_id" value="<?php echo e($billing_addresses->first()->id ?? ''); ?>">
                            <input type="hidden" name="authorizenet_data_descriptor" id="authorizenet_data_descriptor" value="">
                            <input type="hidden" name="authorizenet_data_value" id="authorizenet_data_value" value="">
                            <button type="button" class="btn btn-success btn-block" id="submit-card-btn"><i class="fa fa-credit-card"></i> <span class="ml-10">Pay with Card</span></button>
                        </form>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if(config('services.authorize.api_login_id') && config('services.authorize.client_key')): ?>
<script src="<?php echo e(config('services.authorize.mode') === 'live' ? 'https://js.authorize.net/v1/Accept.js' : 'https://jstest.authorize.net/v1/Accept.js'); ?>" charset="utf-8"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var billingSelect = document.getElementById('modal_billing_address');
    if (billingSelect) {
        billingSelect.addEventListener('change', function() {
            var id = this.value;
            document.getElementById('paypal_billing_id').value = id;
            document.getElementById('card_billing_id').value = id;
        });
    }
    var paypalForm = document.getElementById('paypal-form');
    if (paypalForm) {
        paypalForm.addEventListener('submit', function() {
            document.getElementById('paypal_billing_id').value = document.getElementById('modal_billing_address').value;
        });
    }
    var cardForm = document.getElementById('card-form');
    var submitCardBtn = document.getElementById('submit-card-btn');
    if (cardForm && submitCardBtn) {
        submitCardBtn.addEventListener('click', function() {
            var cardNumber = document.getElementById('auth-card-number').value.replace(/\s/g, '');
            var expMonth = document.getElementById('auth-exp-month').value;
            var expYear = document.getElementById('auth-exp-year').value;
            var cardCode = document.getElementById('auth-card-code').value;
            var errEl = document.getElementById('authorize-errors');
            errEl.textContent = '';
            if (!cardNumber || !expMonth || !expYear || !cardCode) {
                errEl.textContent = 'Please fill all card fields.';
                return;
            }
            document.getElementById('card_billing_id').value = document.getElementById('modal_billing_address').value;
            var authData = { clientKey: '<?php echo e(config("services.authorize.client_key")); ?>', apiLoginID: '<?php echo e(config("services.authorize.api_login_id")); ?>' };
            var cardData = { cardNumber: cardNumber, month: expMonth, year: expYear, cardCode: cardCode };
            if (typeof Accept === 'undefined') {
                errEl.textContent = 'Payment script not loaded. Try again.';
                return;
            }
            Accept.dispatchData({ authData: authData, cardData: cardData }, function(response) {
                if (response.messages.resultCode === 'Error') {
                    var msg = (response.messages.message || []).map(function(m) { return m.text; }).join(' ');
                    errEl.textContent = msg || 'Invalid card data.';
                    return;
                }
                document.getElementById('authorizenet_data_descriptor').value = response.opaqueData.dataDescriptor;
                document.getElementById('authorizenet_data_value').value = response.opaqueData.dataValue;
                cardForm.submit();
            });
        });
    }
});
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\company\package-upgrade.blade.php ENDPATH**/ ?>