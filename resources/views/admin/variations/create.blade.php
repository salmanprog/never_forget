@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Variations</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('variations.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('variations.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">

                        {{-- <div class="form-group">
                            <div class="col-md-2" style="text-align: end;">
                                <label for="" class="control-label">Category <span style="color:red">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <select name="category_id" id="category_id" class="form-control get_sub_category" required>
                                    <option value="" selected> Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red">{{ $errors->first('category_id') }}</span>
                            </div>
                        </div>  --}}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"> 
                                <span style="color: red">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Price <span style="color:red">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}"> 
                                <span style="color: red">{{ $errors->first('price') }}</span>
                            </div>
                        </div>


                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Image <span style="color: red">*</span></label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" name="image" class="form-control" accept="image" id="image">
								<span style="color: red">{{ $errors->first('image') }}</span>
							</div>
							<div class="col-sm-4">
								<img style="width: 80px" id="banner_preview"  src="{{ asset('public/admin/assets/images/default.jpg') }}"  alt="Image Not Found ">
							</div>
						</div>  --}}

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
<script type="text/javascript">
    $(document).ready(function () {
        image.onchange = evt => {
			const [file] = image.files
			if (file) {
				banner_preview.src = URL.createObjectURL(file)
			}
		}
    });
</script>
@endpush

