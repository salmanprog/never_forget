@extends('layouts.admin.app')
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>@if(!empty($model)) Edit @else Add @endif Page Setting of <strong> {{ $model->title }}</strong></h1>
	</div> 
	<div class="content-header-right">
		<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
				<div class="box box-info">
					<div class="box-body"> 
						<div class="form-group">
							<label for="video" class="col-sm-2 control-label">Video</label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" name="how_it_works_video" id="video" class="form-control" accept="video/mp4,video/quicktime,video/ogg">
							</div>
							@if(isset($page_data['how_it_works_video']))
							<div class="col-sm-4">
								<video id="video_preview" style="width: 250px;" controls>
									<source src="{{ asset('public/admin/assets/videos/'.$page_data['how_it_works_video']) }}">
									Your browser does not support the video tag.
								</video>
							</div>
							@else
							<div class="col-sm-4">
								<video id="video_preview" style="width: 250px;" controls>
									<source src="">
									Your browser does not support the video tag.
								</video>
							</div>
							@endif
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Show on How It Works? </label>
							<div class="col-sm-2">
								<select name="how_it_works_status" class="form-control select2 select2-accessible" style="width:auto;" tabindex="-1" aria-hidden="true">
									<option value="1" {{ (isset($page_data['how_it_works_status'])?($page_data['how_it_works_status']==1?'selected':''):'') }}>Show</option>
									<option value="0" {{ (isset($page_data['how_it_works_status'])?($page_data['how_it_works_status']==0?'selected':''):'') }}>Hide</option>
								</select>
							</div>
						</div>
                       
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_blog">Submit</button>
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
				height: 100,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}

		// Video preview
		document.getElementById('video').addEventListener('change', function(event) {
			const file = event.target.files[0];
			if (file && file.type.startsWith('video/')) {
				const videoPreview = document.getElementById('video_preview');
				videoPreview.style.display = 'block';
				const source = videoPreview.getElementsByTagName('source')[0];
				source.src = URL.createObjectURL(file);
				videoPreview.load();
			}
		});
	});
</script>
@endpush
