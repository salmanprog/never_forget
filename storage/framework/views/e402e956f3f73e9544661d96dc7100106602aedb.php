<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Style</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('styles.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('styles.store')); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Have Sub Style</label>
                            <div class="col-md-9">
                                <select name="sub_style" id="sub_style" class="form-control">
                                    <option value="0" selected> No Sub Style</option>
                                    <?php $__currentLoopData = $sub_styles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_style): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($sub_style->id); ?>"><?php echo e($sub_style->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span style="color: red"><?php echo e($errors->first('sub_style')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Image <span style="color: red">*</span></label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*"  name="image" id="image">
                                <span style="color: red"><?php echo e($errors->first('image')); ?></span>
                            </div>
                            <div class="col-sm-4" >
                                <img style="width: 80px" id="banner_preview"  src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>"  alt="Image Not Found ">
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="title" value="<?php echo e(old('title')); ?>" placeholder="Enter title">
								<span style="color: red"><?php echo e($errors->first('title')); ?></span>
							</div>
						</div>

                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Image CSS</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="image_css" style="height:140px;" placeholder="Enter Image CSS"></textarea>
								<span style="color: red"><?php echo e($errors->first('image_css')); ?></span>
							</div>
						</div>
                        <hr>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Heading</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="heading" value="<?php echo e(old('heading')); ?>" placeholder="Enter heading">
								<span style="color: red"><?php echo e($errors->first('heading')); ?></span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:140px;" placeholder="Enter description"></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
							</div>
						</div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Description Images</label>
                            <div class="col-sm-6" style="padding-top: 5px">
                                <input type="file" name="description_images[]" id="description_images" class="form-control" multiple /><br />
                                <span style="color: red"><?php echo e($errors->first('description_images')); ?></span>
                            </div>
                            <div class="col-sm-4">
                                <div id="image_previewww"><img style="width: 80px" id="banner_previewww"  src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>"  alt="Image Not Found "></div>
                            </div>
                        </div>

                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Back Image</label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*"  name="back_image" id="back_image">
                                <span style="color: red"><?php echo e($errors->first('back_image')); ?></span>
                            </div>
                            <div class="col-sm-4" >
                                <img style="width: 80px" id="banner_previeww"  src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>"  alt="Image Not Found ">
                            </div>
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Frame Image</label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*"  name="frame_image" id="frame_image">
                                <span style="color: red"><?php echo e($errors->first('frame_image')); ?></span>
                            </div>
                            <div class="col-sm-4" >
                                <img style="width: 80px" id="banner_frame"  src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>"  alt="Image Not Found ">
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

        back_image.onchange = evt => {
            const [file] = back_image.files
            if (file) {
                banner_previeww.src = URL.createObjectURL(file)
            }
		}

        frame_image.onchange = evt => {
            const [file] = frame_image.files
            if (file) {
                banner_frame.src = URL.createObjectURL(file)
            }
		}

        description_images.onchange = evt => {
            const [file] = description_images.files
            if (file) {
                banner_previewww.src = URL.createObjectURL(file)
            }
		}

	});
</script>
<script>
    $(document).ready(function() {
        $('#description_images').change(function() {
            $('#image_previewww').html('');
            $.each(this.files, function(index, file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img>').attr('src', e.target.result).css('width', '80px');
                    $('#image_previewww').append(img);
                };
                reader.readAsDataURL(file);
            });
        });
    });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\business_card\create.blade.php ENDPATH**/ ?>