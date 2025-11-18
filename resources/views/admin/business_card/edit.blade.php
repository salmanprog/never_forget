@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Style</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('styles.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('styles.update', $model->id) }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				{{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Have Sub Style</label>
                            <div class="col-md-9">
                                <select name="sub_style" id="sub_style" class="form-control">
                                    <option value="" selected>No Sub Style</option>
                                    @foreach ($sub_styles as $sub_style)
                                        <option value="{{ $sub_style->id }}" {{ $model->sub_style == $sub_style->id ? 'selected':'' }}>{{ $sub_style->title }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first('sub_style') }}</span>
                            </div>
						</div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*" name="image" id="image" >
                            </div>
                            @if(!empty($model->image))
                                <div class="col-sm-4">
                                    <img style="width: 80px" src="{{ asset('public/admin/assets/images/styles') }}/{{ $model->image }}" alt="">
                                </div>
                            @else
                                <div class="col-sm-4" >
                                    <img style="width: 80px" id="banner_preview"  src="{{ asset('public/admin/assets/images/default.jpg') }}"  alt="Image Not Found ">
                                </div>
                            @endif
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="title" value="{{$model->title}}">
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Image CSS</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="image_css" style="height:140px;">{!! $model->image_css !!}</textarea>
							</div>
						</div>
                        <hr>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Heading</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="heading" value="{{$model->heading}}">
							</div>
						</div>

                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Description</label>
							<div class="col-sm-9">
                                <textarea class="form-control" name="description" style="height:140px;">{!! $model->description !!}</textarea>
								<span style="color: red">{{ $errors->first('description') }}</span>
							</div>
						</div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Description Images</label>
                            <div class="col-sm-6" style="padding-top: 5px">
                                <input type="file" class="form-control" accept="image/*" id="description_images" name="description_images[]" multiple>
                            </div>
                            <div class="col-sm-4">
                                <div id="image_previewww">
                                    @if (!empty($model->description_images))
                                        @foreach (json_decode($model->description_images) as $image)
                                            <img style="width: 80px" src="{{ asset('public/admin/assets/images/styles/description-image/' . $image) }}" alt="">
                                        @endforeach
                                    @else
                                        <img style="width: 80px" id="banner_previewww" src="{{ asset('public/admin/assets/images/default.jpg') }}" alt="Image Not Found">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Back Image</label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*" name="back_image" id="back_image" >
                            </div>
                            @if(!empty($model->back_image))
                                <div class="col-sm-4">
                                    <img style="width: 80px" src="{{ asset('public/admin/assets/images/styles/back-image') }}/{{ $model->back_image }}" alt="">
                                </div>
                            @else
                                <div class="col-sm-4">
                                    <img style="width: 80px" id="banner_previeww" src="{{ asset('public/admin/assets/images/default.jpg') }}" alt="Image Not Found">
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Frame Image</label>
                            <div class="col-sm-6" style="padding-top:5px">
                                <input type="file" class="form-control" accept="image*" name="frame_image" id="frame_image" >
                            </div>
                            @if(!empty($model->frame_image))
                                <div class="col-sm-4">
                                    <img style="width: 80px" src="{{ asset('public/admin/assets/images/styles/frame-image') }}/{{ $model->frame_image }}" alt="">
                                </div>
                            @else
                                <div class="col-sm-4">
                                    <img style="width: 80px" id="banner_frame" src="{{ asset('public/admin/assets/images/default.jpg') }}" alt="Image Not Found">
                                </div>
                            @endif
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status</label>
							<div class="col-sm-9">
								<select name="status" class="form-control" id="">
									<option value="1" {{ $model->status==1?'selected':'' }}>Active</option>
									<option value="0" {{ $model->status==0?'selected':'' }}>In-Active</option>
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
        
        image.onchange = evt => {
			const [file] = image.files
			if (file) {
				banner_preview.src = URL.createObjectURL(file)
			}
		}

        description_images.onchange = evt => {
            const [file] = description_images.files
            if (file) {
                banner_previewww.src = URL.createObjectURL(file)
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

	});
</script>
<script>
    $(document).ready(function() {
        $('input[name="description_images[]"]').change(function() {
            var imagePreviewContainer = $('#image_previewww');
            imagePreviewContainer.empty();
            var files = this.files;
            if (files.length > 0) {
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (file.type.match('image.*')) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = $('<img>').attr('src', e.target.result).css('width', '80px');
                            imagePreviewContainer.append(img);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            }
        });
    });
    </script>
@endpush
