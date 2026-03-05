<?php if(Auth::user()->account_type == 'Company'): ?>
    
<?php endif; ?>

<?php $__env->startSection('title', $page_title); ?>
<style>
	.alert {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.custom-alert-warning {
		background-color: #cfa40c !important;
		color: #fff !important;
	}
	.btn-primary {
		background-color: #081e37 !important;
		text-decoration: none !important;
	}
	.info-box-icon {
		display: flex !important;
		justify-content: center;
		align-items: center;
	}

</style>
<?php $__env->startSection('content'); ?>
    <?php
        $userCompany = Auth::user()->administeredCompany ?? Auth::user()->company;
    ?>
    <section class="content-header">
        <h1 style="color:#c98900 !important; font-weight: 700;"><?php echo e(Auth::user()->account_type); ?> Dashboard</h1>
    </section>
    <section class="content">
        <div class="row">
            <?php if(Auth::user()->account_type == 'Company' &&
                    (!$userCompany || (isset($userCompany->is_profile_completed) && $userCompany->is_profile_completed == 0))): ?>
                <div class="alert  custom-alert-warning alert-dismissible" role="alert">
                    
                    <div>
                        <strong>Complete your profile.</strong> Please fill in all required fields in your profile.
                    </div>
                    <div>
                        <a href="<?php echo e(route('company.profile.edit')); ?>" class="btn btn-primary btn-sm ml-2"
                            style="margin-left: 10px;">Edit Profile</a>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Dashboard Cards - Mobile Responsive -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#" style="text-decoration: none;">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text" style="color: #000 !important;">Total</span>
                            <span class="info-box-number" style="color: #000 !important;font-weight: 600;">#</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#" style="text-decoration: none;">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="fa fa-truck" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text" style="color: #000 !important;">Total</span>
                            <span class="info-box-number" style="color: #000 !important;font-weight: 600;">#</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#" style="text-decoration: none;">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text" style="color: #000 !important;">Total</span>
                            <span class="info-box-number" style="color: #000 !important;font-weight: 600;">#</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <a href="#" style="text-decoration: none;">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="fa fa-users" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text" style="color: #000 !important;">Total</span>
                            <span class="info-box-number" style="color: #000 !important;font-weight: 600;">#</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/website/company-dashboard/dashboard.blade.php ENDPATH**/ ?>