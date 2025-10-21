@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
@endphp

@extends($layout)
@section('title', $page_title)
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Profile</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
	</div>
</section>
<style>
	a.password-visibility i {
		position: absolute;
		top: 8px;
		right: 28px;
		font-size: initial;
	}
</style>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('success'))
			<div class="callout callout-success">
				{{ session('success') }}
			</div>
			@endif
			<form action="{{ route('user.profile.update') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Profile Image</label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" class="form-control" accept="image*" name="image" id="image">
							</div>
							<div class="col-sm-4">
								<img style="width: 80px " id="banner_preview" src="{{ asset('public/admin/assets/images/UserImage') }}/{{  $user->image }}" alt="">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" value="{{ $user->name }}" name="name" placeholder="Enter First Name">
								<span style="color: red">{{ $errors->first('name') }}</span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="last_name" value="{{ $user->last_name }}" placeholder="Enter Last Name">
								<span style="color: red">{{ $errors->first('last_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Date of Birth</label>
							<div class="col-sm-9">
								<input type="date" name="date_of_birth" class="form-control" value="{{ $user->date_of_birth }}" placeholder="Enter Date of Birth">
								<span style="color: red">{{ $errors->first('date_of_birth') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Gender</label>
							<div class="col-sm-9">
								<select name="gender" id="gender" class="form-control">
									<option value="" {{ !$user->gender ? 'selected' : '' }}>Select Gender</option>
									<option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
									<option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
								</select>

								<span style="color: red">{{ $errors->first('gender') }}</span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Designation</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="designation" value="{{ $user->designation }}" placeholder="Enter designation">
								<span style="color: red">{{ $errors->first('designation') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Street Address</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="address" value="{{ $user->address }}" placeholder="Enter Street Address">
								<span style="color: red">{{ $errors->first('address') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">WhatsApp Number</label>
							<div class="col-sm-9">
								<input type="phone" autocomplete="off" class="form-control" name="whatsapp" value="{{ $user->whatsapp }}" placeholder="Enter whatsapp number">
								<span style="color: red">{{ $errors->first('whatsapp') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Facebook Link</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="facebook" value="{{ $user->facebook }}" placeholder="Enter facebook link">
								<span style="color: red">{{ $errors->first('facebook') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Twitter Link</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="twitter" value="{{ $user->twitter }}" placeholder="Enter twitter link">
								<span style="color: red">{{ $errors->first('twitter') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">LinkedIn Link</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="linkedin" value="{{ $user->linkedin }}" placeholder="Enter linkedin link">
								<span style="color: red">{{ $errors->first('linkedin') }}</span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">About Me</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="about_me" style="height:140px;">{!! $user->about_me !!}</textarea>
							</div>
						</div>
						{{-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">State<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<select name="city_id" id="city_id" class="form-control">
									<option value="">Select State</option>
									@foreach ($cities as $city)
									<option value="{{ $city->id }}" {{ $user->city_id==$city->id?'selected':'' }}>{{ $city->city }}</option>
									@endforeach
								</select>
								<span style="color: red">{{ $errors->first('city_id') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">City<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<select name="state_id" id="state_id" class="form-control">
									<option value="{{ $user->state_id }}" selected>Select City</option>
								</select>
								<span style="color: red">{{ $errors->first('state_id') }}</span>
							</div>
						</div> --}}
						{{-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">Zip Code</label>
							<div class="col-sm-9">
								<input type="number" min="1" autocomplete="off" class="form-control" name="zip_code" value="{{ $user->zip_code }}" placeholder="Enter Zip Code">
								<span style="color: red">{{ $errors->first('zip_code') }}</span>
							</div>
						</div> --}}
						{{--  <div class="form-group">
							<label for="" class="col-sm-2 control-label">License Number</label>
							<div class="col-sm-9">
								<input type="number" min="1" autocomplete="off" class="form-control" name="license" value="{{ $user->license }}" placeholder="Enter License Number">
								<span style="color: red">{{ $errors->first('license') }}</span>
							</div>
						</div>  --}}
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" readonly value="{{ $user->email }}" placeholder="Enter Email">
								<span style="color: red">{{ $errors->first('email') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-9 password-group">
								<input type="password" autocomplete="off" class="form-control password-box" name="password" placeholder="Enter new password">
								<a href="#!" class="password-visibility"><i class="fa fa-eye"></i></a>
								<span style="color: red">{{ $errors->first('password') }}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Confirm Password</label>
							<div class="col-sm-9 password-group">
								<input type="password" autocomplete="off" class="form-control password-box" name="confirm-password" placeholder="Confirm password">
								<a href="#!" class="password-visibility"><i class="fa fa-eye"> </i></a>
								<span style="color: red">{{ $errors->first('confirm-password') }}</span>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Save Changes</button>
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
	$(function() {
		$('.password-group').find('.password-box').each(function(index, input) {
			var $input = $(input);
			$input.parent().find('.password-visibility').click(function() {
				var change = "";
				if ($(this).find('i').hasClass('fa-eye')) {
					$(this).find('i').removeClass('fa-eye')
					$(this).find('i').addClass('fa-eye-slash')
					change = "text";
				} else {
					$(this).find('i').removeClass('fa-eye-slash')
					$(this).find('i').addClass('fa-eye')
					change = "password";
				}
				var rep = $("<input type='" + change + "' />")
					.attr('id', $input.attr('id'))
					.attr('name', $input.attr('name'))
					.attr('class', $input.attr('class'))
					.val($input.val())
					.insertBefore($input);
				$input.remove();
				$input = rep;
			}).insertAfter($input);
		});
	});
</script>
<script>
	/* City on load call */
	$(document).ready(function() {
		var city_id = $('#city_id').val();

		$.ajax({
			url: "{{ route('get_states') }}",
			data: {
				'city_id': city_id
			},
			type: 'GET',
			success: function(response) {
				var html = '';
				$.each(response, function(item, val) {
					html += '<option value="' + val.id + '">' + val.state + '</option>';
				});
				$('#state_id').html(html);

			}
		});

	});
	/* Cite on Chnage call */
	$(document).on('change', '#city_id', function() {
		var city_id = $(this).val();
		$.ajax({
			url: "{{ route('get_states') }}",
			data: {
				'city_id': city_id
			},
			type: 'GET',
			success: function(response) {
				var html = '';
				$.each(response, function(item, val) {
					html += '<option value="' + val.id + '">' + val.state + '</option>';
				});
				$('#state_id').html(html);

			}
		});
	});





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
			}
		});

		image.onchange = evt => {
			const [file] = image.files
			if (file) {
				banner_preview.src = URL.createObjectURL(file)
			}
		}
	});
</script>
@endpush