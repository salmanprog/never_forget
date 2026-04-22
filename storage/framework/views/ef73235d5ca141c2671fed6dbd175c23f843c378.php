<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Testimonial</h1>
	</div>
	<div class="content-header-right">
		<?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<a href="<?php echo e(route('testimonial.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('testimonial.update', $testimonial->slug)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo e($testimonial->name); ?>">
							</div>
						</div>
						 
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Rating <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<div class="star-rating">
									<input type="hidden" name="rating" id="selected-rating" value="<?php echo e($testimonial->rating); ?>">
									<div class="rating-stars">
										<?php for($i = 1; $i <= 5; $i++): ?>
											<i class="far fa-star star-btn" data-rating="<?php echo e($i); ?>"></i>
										<?php endfor; ?>
									</div>
								</div>
								<span style="color: red"><?php echo e($errors->first('rating')); ?></span>
							</div>
						</div> 
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Media Type <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<label style="margin-right: 20px;">
									<input type="radio" name="media_type" value="image" id="media_image" <?php echo e($testimonial->image ? 'checked' : ''); ?>> Image
								</label>
								<label>
									<input type="radio" name="media_type" value="video" id="media_video" <?php echo e($testimonial->video ? 'checked' : ''); ?>> Video
								</label>
								<span style="color: red"><?php echo e($errors->first('media_type')); ?></span>
							</div>
						</div>
						<div class="form-group" id="image-group" style="<?php echo e($testimonial->video ? 'display: none;' : ''); ?>">
							<label for="" class="col-sm-2 control-label">Image <span style="color: red">*</span></label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" name="image" class="form-control" accept="image/*" id="image">
								<span style="color: red"><?php echo e($errors->first('image')); ?></span>
							</div>
							<div class="col-sm-4">
								<?php if($testimonial->image): ?>
									<img style="width: 80px" id="banner_preview" src="<?php echo e(asset('public/admin/assets/images/testimonials/'.$testimonial->image)); ?>" alt="">
								<?php else: ?>
									<img style="width: 80px" id="banner_preview" src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" alt="">
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group" id="video-group" style="<?php echo e($testimonial->image ? 'display: none;' : ''); ?>">
							<label for="" class="col-sm-2 control-label">Video <span style="color: red">*</span></label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" name="video" class="form-control" accept="video/*" id="video">
								<span style="color: red"><?php echo e($errors->first('video')); ?></span>
							</div>
							<div class="col-sm-4">
								<?php if($testimonial->video): ?>
									<video style="width: 120px; height: 80px;" id="banner_preview_video" autoplay muted loop controls src="<?php echo e(asset('public/admin/assets/images/testimonials/'.$testimonial->video)); ?>"></video>
								<?php else: ?>
									<video style="width: 120px; height: 80px;" id="banner_preview_video" autoplay muted loop controls></video>
								<?php endif; ?>
							</div>
						</div>
							
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Comment <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="comment" style="height:200px;"><?php echo e($testimonial->comment); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" class="form-control" id="">
									<option value="1" <?php echo e($testimonial->status==1?'selected':''); ?>>Active</option>
									<option value="0" <?php echo e($testimonial->status==0?'selected':''); ?>>In-Active</option>
								</select>
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

		$("#regform").validate({
			rules: {
				name: "required",
				comment: "required",
			}
		});
		image.onchange = evt => {
			const [file] = image.files
			if (file) {
				banner_preview.src = URL.createObjectURL(file)
			}
		}

		// Initialize stars with the existing rating
		const existingRating = <?php echo e($testimonial->rating); ?>;
		updateStars(existingRating);

		$('.star-btn').on('click', function() {
			const rating = $(this).data('rating');
			$('#selected-rating').val(rating);
			updateStars(rating);
		});

		$('.star-btn').on('mouseenter', function() {
			const rating = $(this).data('rating');
			previewStars(rating);
		});

		$('.rating-stars').on('mouseleave', function() {
			const currentRating = $('#selected-rating').val();
			updateStars(currentRating);
		});

		function updateStars(rating) {
			$('.star-btn').each(function() {
				const starRating = $(this).data('rating');
				if (starRating <= rating) {
					$(this).removeClass('far').addClass('fas active');
				} else {
					$(this).removeClass('fas active').addClass('far');
				}
			});
		}

		function previewStars(rating) {
			$('.star-btn').each(function() {
				const starRating = $(this).data('rating');
				if (starRating <= rating) {
					$(this).removeClass('far').addClass('fas');
				} else {
					$(this).removeClass('fas').addClass('far');
				}
			});
		}

		// Store original image and video sources
		var originalImageSrc = $('#banner_preview').attr('src');
		var originalVideoSrc = $('#banner_preview_video').attr('src');

		// Handle radio button toggle functionality
		$('input[name="media_type"]').on('change', function() {
			if ($(this).val() === 'image') {
				// Show image group, hide video group
				$('#image-group').show();
				$('#video-group').hide();
				// Clear video input and reset video preview to original
				$('#video').val('');
				$('#banner_preview_video').attr('src', originalVideoSrc);
			} else if ($(this).val() === 'video') {
				// Show video group, hide image group
				$('#video-group').show();
				$('#image-group').hide();
				// Clear image input and reset preview to original
				$('#image').val('');
				$('#banner_preview').attr('src', originalImageSrc);
			}
		});

		// Handle image preview when file is selected
		$('#image').on('change', function() {
			if (this.files && this.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#banner_preview').attr('src', e.target.result);
					// Update original image source for future reference
					originalImageSrc = e.target.result;
				}
				reader.readAsDataURL(this.files[0]);
			}
		});

		// Handle video preview when file is selected
		$('#video').on('change', function() {
			if (this.files && this.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#banner_preview_video').attr('src', e.target.result);
					// Update original video source for future reference
					originalVideoSrc = e.target.result;
				}
				reader.readAsDataURL(this.files[0]);
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
<style>
    .star-rating .rating-stars {
        display: inline-flex;
        gap: 5px;
        cursor: pointer;
    }
    .star-rating .star-btn {
        font-size: 24px;
        color: #ccc;
        transition: color 0.2s;
    }
    .star-rating .star-btn.active {
        color: #ffc107;
    }
    .star-rating .star-btn:hover {
        color: #ffd700;
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\testimonial\edit.blade.php ENDPATH**/ ?>