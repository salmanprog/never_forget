<?php if(Auth::user()->hasRole('Individual')): ?>
    
<?php endif; ?>

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
  <section class="content-header">
	<h1 style="color:#c98900 !important; font-weight: 700;"><?php echo e(Auth::user()->account_type); ?> Dashboard</h1>
  </section>
  <section class="content">
    <div class="row">
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

<?php echo $__env->make('layouts.individual.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/individual-dashboard/dashboard.blade.php ENDPATH**/ ?>