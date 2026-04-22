	
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Shipping Address</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('shipping_address.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('shipping_address.update', $shipping->id)); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="first_name" value="<?php echo e($shipping->first_name); ?>">
								<span style="color: red"><?php echo e($errors->first('first_name')); ?></span>
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Last Name <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="last_name" value="<?php echo e($shipping->last_name); ?>">
								<span style="color: red"><?php echo e($errors->first('last_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
                            <label for="" class="col-sm-2 control-label">Company<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="company" value="<?php echo e($shipping->company); ?>">
								<span style="color: red"><?php echo e($errors->first('company')); ?></span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Country<span style="color:red">*</span></label>
							<div class="col-sm-9">
                                <input type="text" autocomplete="off" class="form-control" name="country" value="<?php echo e($shipping->country); ?>">
								<span style="color: red"><?php echo e($errors->first('country')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Street<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" autocomplete="off" class="form-control" name="street" value="<?php echo e($shipping->street); ?>">
								<span style="color: red"><?php echo e($errors->first('street')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Town<span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" autocomplete="off" class="form-control" name="town" value="<?php echo e($shipping->town); ?>">
								<span style="color: red"><?php echo e($errors->first('town')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Postal Code<span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="postcode" value="<?php echo e($shipping->postcode); ?>">
								<span style="color: red"><?php echo e($errors->first('postcode')); ?></span>
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

<?php echo $__env->make('layouts.individual.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\shipping_address\edit.blade.php ENDPATH**/ ?>