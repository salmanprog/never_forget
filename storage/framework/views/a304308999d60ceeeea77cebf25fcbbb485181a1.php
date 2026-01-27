	
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Billing Address</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('billing_address.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('billing_address.update', $address->id)); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="first_name" value="<?php echo e($address->first_name); ?>">
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Last Name <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="last_name" value="<?php echo e($address->last_name); ?>">
							</div>
						</div>
						<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Company<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="company" value="<?php echo e($address->company); ?>">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Country<span style="color:red">*</span></label>
							<div class="col-sm-9">
                                <input type="text" autocomplete="off" class="form-control" name="country" value="<?php echo e($address->country); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Street<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" autocomplete="off" class="form-control" name="street" value="<?php echo e($address->street); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Town<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" autocomplete="off" class="form-control" name="town" value="<?php echo e($address->town); ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Postal Code<span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="postcode" value="<?php echo e($address->postcode); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone<span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="phone" value="<?php echo e($address->phone); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="email" value="<?php echo e($address->email); ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}
        image.onchange = evt => {
			const [file] = image.files
			if (file) {
				banner_preview.src = URL.createObjectURL(file)
			}
		}

	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.individual.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/admin/billing_address/edit.blade.php ENDPATH**/ ?>