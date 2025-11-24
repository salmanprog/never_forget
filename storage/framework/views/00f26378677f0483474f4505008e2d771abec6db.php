<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1><?php if(!empty($model)): ?> Edit <?php else: ?> Add <?php endif; ?> Page Setting of <strong><?php echo e($model->title); ?></strong></h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('page.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('page_setting.store')); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>

				<input type="hidden" name="parent_slug" id="" value="<?php echo e($model->slug); ?>">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Contact Heading </label>
							<div class="col-sm-9">
								<input type="text" name="contact_heading" class="form-control" value="<?php echo e(isset($page_data['contact_heading'])?$page_data['contact_heading']:''); ?>" placeholder="Enter heading">
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Contact Email </label>
							<div class="col-sm-9">
								<input type="email" class="form-control" name="contact_email" value="<?php echo e(isset($page_data['contact_email'])?$page_data['contact_email']:''); ?>" placeholder="Enter email">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Contact Phone </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="contact_phone" value="<?php echo e(isset($page_data['contact_phone'])?$page_data['contact_phone']:''); ?>" placeholder="Enter phone number">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Facebook Link </label>
							<div class="col-sm-9">
								<input type="text" name="contact_facebook" class="form-control" value="<?php echo e(isset($page_data['contact_facebook'])?$page_data['contact_facebook']:''); ?>" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Instagram Link </label>
							<div class="col-sm-9">
								<input type="text" name="contact_instagram" class="form-control" value="<?php echo e(isset($page_data['contact_instagram'])?$page_data['contact_instagram']:''); ?>" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Twitter Link </label>
							<div class="col-sm-9">
								<input type="text" name="contact_twitter" class="form-control" value="<?php echo e(isset($page_data['contact_twitter'])?$page_data['contact_twitter']:''); ?>" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">LinkedIn Link </label>
							<div class="col-sm-9">
								<input type="text" name="contact_linkedin" class="form-control" value="<?php echo e(isset($page_data['contact_linkedin'])?$page_data['contact_linkedin']:''); ?>" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">TikTok Link </label>
							<div class="col-sm-9">
								<input type="text" name="contact_tiktok" class="form-control" value="<?php echo e(isset($page_data['contact_tiktok'])?$page_data['contact_tiktok']:''); ?>" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Pinterest Link </label>
							<div class="col-sm-9">
								<input type="text" name="contact_pinterest" class="form-control" value="<?php echo e(isset($page_data['contact_pinterest'])?$page_data['contact_pinterest']:''); ?>" placeholder="Enter social link">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Image</label>
							<div class="col-sm-6">
								<input type="file" name="contact_us_image" class="form-control">
							</div>
                            <?php if(isset($page_data['contact_us_image'])): ?>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="<?php echo e(asset('public//public/admin/assets/images/page/'.$page_data['contact_us_image'])); ?>" class="existing-photo" style="height:100px;">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_contact">Update</button>
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
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/admin/page_setting/contact.blade.php ENDPATH**/ ?>