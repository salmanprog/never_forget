@extends('layouts.individual.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Billing Address</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('billing_address.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('billing_address.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="Enter first name">
								<span style="color: red">{{ $errors->first('first_name') }}</span>
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Last Name<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Enter last name">
								<span style="color: red">{{ $errors->first('last_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Company<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="company" value="{{ old('company') }}" placeholder="Enter company">
								<span style="color: red">{{ $errors->first('company') }}</span>
							</div>
						</div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Country<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" autocomplete="off" class="form-control" name="country" value="{{ old('country') }}" placeholder="Enter country">
                                <span style="color: red">{{ $errors->first('country') }}</span>
                            </div>
                         </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Street<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" autocomplete="off" class="form-control" name="street" value="{{ old('street') }}" placeholder="Enter street">
                                <span style="color: red">{{ $errors->first('street') }}</span>
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Town<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" autocomplete="off" class="form-control" name="town" value="{{ old('town') }}" placeholder="Enter town">
                                <span style="color: red">{{ $errors->first('town') }}</span>
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Postal Code<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="number" autocomplete="off" class="form-control" name="postcode" value="{{ old('postcode') }}" placeholder="Enter postcode">
                                <span style="color: red">{{ $errors->first('postcode') }}</span>
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="tel" autocomplete="off" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter phone">
                                <span style="color: red">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="email" autocomplete="off" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter email">
                                <span style="color: red">{{ $errors->first('email') }}</span>
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

        var todayDate = new Date();
            var month = todayDate.getMonth() +1;
            var year = todayDate.getUTCFullYear();
            var tDate = todayDate.getDate();
            if(month < 10){
                month= "0" + month;
            }
            if(tDate < 10){
                tDate= "0" + tDate;
            }
            var maxDate = year + "-" + month + "-" + tDate ;
            $('.futuredate').attr('max', maxDate);
	});
</script>
@endpush
