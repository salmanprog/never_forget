@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Testimonial</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('testimonial.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('testimonial.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name">
								<span style="color: red">{{ $errors->first('name') }}</span>
							</div>
						</div>
						{{-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">Designation </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="designation" value="{{ old('designation') }}" placeholder="Enter designation">
								<span style="color: red">{{ $errors->first('designation') }}</span>
							</div>
						</div> --}}
 
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Rating <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<div class="star-rating">
									<input type="hidden" name="rating" id="selected-rating" value="{{ old('rating', 1) }}">
									<div class="rating-stars">
										@for($i = 1; $i <= 5; $i++)
											<i class="far fa-star star-btn" data-rating="{{ $i }}"></i>
										@endfor
									</div>
								</div>
								<span style="color: red">{{ $errors->first('rating') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Media Type <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<label style="margin-right: 20px;">
									<input type="radio" name="media_type" value="image" id="media_image" checked> Image
								</label>
								<label>
									<input type="radio" name="media_type" value="video" id="media_video"> Video
								</label>
								<span style="color: red">{{ $errors->first('media_type') }}</span>
							</div>
						</div>
						<div class="form-group" id="image-group">
							<label for="" class="col-sm-2 control-label">Image <span style="color: red">*</span></label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" name="image" class="form-control" accept="image/*" id="image">
								<span style="color: red">{{ $errors->first('image') }}</span>
							</div>
							<div class="col-sm-4">
								<img style="width: 80px" id="banner_preview"  src="{{ asset('public/admin/assets/images/default.jpg') }}"  alt="Image Not Found ">
							</div>
						</div>
						<div class="form-group" id="video-group" style="display: none;">
							<label for="" class="col-sm-2 control-label">Video <span style="color: red">*</span></label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" name="video" class="form-control" accept="video/*" id="video">
								<span style="color: red">{{ $errors->first('video') }}</span>
							</div>
							<div class="col-sm-4">
								<video style="width: 120px; height: 80px;" id="banner_preview_video" autoplay muted loop controls></video>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Comment <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<textarea class="form-control texteditor" name="comment" style="height:200px;" placeholder="Enter comment"></textarea>
								<span style="color: red">{{ $errors->first('comment') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-9">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection

@push('js')
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
				image: "required",
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

		// Initialize stars based on old value if it exists
		const oldRating = {{ old('rating', 1) }};
		updateStars(oldRating);

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

		// Handle radio button toggle functionality
		$('input[name="media_type"]').on('change', function() {
			if ($(this).val() === 'image') {
				// Show image group, hide video group
				$('#image-group').show();
				$('#video-group').hide();
				// Clear video input and reset video preview
				$('#video').val('');
				$('#banner_preview_video').attr('src', '');
			} else if ($(this).val() === 'video') {
				// Show video group, hide image group
				$('#video-group').show();
				$('#image-group').hide();
				// Clear image input and reset preview
				$('#image').val('');
				$('#banner_preview').attr('src', '{{ asset("public/admin/assets/images/default.jpg") }}');
			}
		});

		// Handle image preview when file is selected
		$('#image').on('change', function() {
			if (this.files && this.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#banner_preview').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			}
		});
		$('#video').on('change', function() {
			if (this.files && this.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#banner_preview_video').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			}
		});
	});
</script>
@endpush

@push('css')
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
@endpush
