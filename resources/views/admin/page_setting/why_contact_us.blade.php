@extends('layouts.admin.app')
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>@if(!empty($model)) Edit @else Add @endif Page Setting of <strong>{{ $model->title }}</strong></h1>
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
							<label for="" class="col-sm-2 control-label">Heading</label>
							<div class="col-sm-9">
								<input type="text" name="why_contact_us_heading" class="form-control" value="{{ isset($page_data['why_contact_us_heading'])?$page_data['why_contact_us_heading']:'' }}" placeholder="Enter heading">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Title one</label>
							<div class="col-sm-9">
								<input type="text" name="title_one" class="form-control" value="{{ isset($page_data['title_one'])?$page_data['title_one']:'' }}" placeholder="Enter title">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Description one</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description_one" style="height:60px;" placeholder="Enter description">{{ isset($page_data['description_one'])?$page_data['description_one']:'' }}</textarea>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Title two</label>
							<div class="col-sm-9">
								<input type="text" name="title_two" class="form-control" value="{{ isset($page_data['title_two'])?$page_data['title_two']:'' }}" placeholder="Enter title">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Description two</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description_two" style="height:60px;" placeholder="Enter description">{{ isset($page_data['description_two'])?$page_data['description_two']:'' }}</textarea>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Title three</label>
							<div class="col-sm-9">
								<input type="text" name="title_three" class="form-control" value="{{ isset($page_data['title_three'])?$page_data['title_three']:'' }}" placeholder="Enter title">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Description three</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description_three" style="height:60px;" placeholder="Enter description">{{ isset($page_data['description_three'])?$page_data['description_three']:'' }}</textarea>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Title four</label>
							<div class="col-sm-9">
								<input type="text" name="title_four" class="form-control" value="{{ isset($page_data['title_four'])?$page_data['title_four']:'' }}" placeholder="Enter title">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Description four</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description_four" style="height:60px;" placeholder="Enter description">{{ isset($page_data['description_four'])?$page_data['description_four']:'' }}</textarea>
							</div>
						</div>
                        
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Image</label>
							<div class="col-sm-6">
								<input type="file" name="why_contact_us_image" class="form-control">
							</div>
                            @if(isset($page_data['why_contact_us_image']))
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('public//public/admin/assets/images/page/'.$page_data['why_contact_us_image']) }}" class="existing-photo" style="height:100px;">
                                    </div>
                                </div>
                            @endif
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
	});
</script>
@endpush
