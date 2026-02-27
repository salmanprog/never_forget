@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Customer</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('user.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('user.update', $user->id)}}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf
				{{ method_field('PATCH') }}
				<div class="box box-info">
					<div class="box-body">
						<!--<div class="form-group">
							<label for="" class="col-sm-2 control-label">Roles <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<select name="roles" id="" class="form-control">
									<option value="" selected>Select role</option>
									@foreach ($roles as $role)
										<option value="{{ $role->id }}" {{ $user->roles[0]->id==$role->id?'selected':'' }}>{{ $role->name }}</option>
									@endforeach
								</select>
								<span style="color: red">{{ $errors->first('name') }}</span>
							</div>
						</div>-->
						@if($user->account_type == 'Company')
						@php $company = $company ?? null; @endphp
						{{-- Basic Company Information --}}
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Basic Company Information</h4></div>
						<div class="form-group">
							<label for="company_name" class="col-sm-2 control-label">Company Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="company_name" value="{{ old('company_name', optional($company)->name) }}" placeholder="Enter Company Name">
								<span style="color: red">{{ $errors->first('company_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="registration_number" class="col-sm-2 control-label">Registration Number</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="registration_number" value="{{ old('registration_number', optional($company)->registration_number) }}" placeholder="Enter Registration Number">
								<span style="color: red">{{ $errors->first('registration_number') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="industry" class="col-sm-2 control-label">Industry</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="industry" value="{{ old('industry', optional($company)->industry) }}" placeholder="Enter Industry">
								<span style="color: red">{{ $errors->first('industry') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="company_website" class="col-sm-2 control-label">Company Website</label>
							<div class="col-sm-8">
								<input type="url" class="form-control" name="company_website" value="{{ old('company_website', optional($company)->website) }}" placeholder="https://example.com">
								<span style="color: red">{{ $errors->first('company_website') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="year_established" class="col-sm-2 control-label">Year Established</label>
							<div class="col-sm-8">
								@php
									$yearVal = old('year_established', optional($company)->year_established);
									if ($yearVal && strlen($yearVal) <= 4 && preg_match('/^\d{4}$/', $yearVal)) {
										$yearVal = $yearVal . '-01-01';
									}
								@endphp
								<input type="date" class="form-control" name="year_established" id="year_established" value="{{ $yearVal }}" max="{{ date('Y-m-d') }}">
								<span style="color: red">{{ $errors->first('year_established') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="number_of_employees" class="col-sm-2 control-label">Number of Employees <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" inputmode="numeric" pattern="[0-9]*" class="form-control" name="number_of_employees" maxlength="10" value="{{ old('number_of_employees', optional($company)->number_of_employees) }}" placeholder="Enter Number of Employees">
								<span style="color: red">{{ $errors->first('number_of_employees') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="company_logo" class="col-sm-2 control-label">Company Logo (upload) <span style="color: red">*</span></label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" class="form-control" accept="image/*" name="company_logo" id="company_logo">
							</div>
							@if($company && !empty($company->logo))
							<div class="col-sm-4">
								<img style="max-width: 80px; max-height: 80px;" id="company_logo_preview" src="{{ asset('public/admin/assets/images/company-logos/' . $company->logo) }}?v={{ $company->updated_at ? $company->updated_at->timestamp : time() }}" alt="Company Logo">
							</div>
							@endif
							<span style="color: red">{{ $errors->first('company_logo') }}</span>
						</div>

						{{-- Primary Contact Information --}}
						<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Primary Contact Information</h4></div>
						<div class="form-group">
							<label for="primary_contact_name" class="col-sm-2 control-label">Full Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="primary_contact_name" value="{{ old('primary_contact_name', optional($company)->primary_contact_name) }}" placeholder="Enter Full Name">
								<span style="color: red">{{ $errors->first('primary_contact_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="job_title" class="col-sm-2 control-label">Job Title</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="job_title" value="{{ old('job_title', optional($company)->job_title) }}" placeholder="Enter Job Title">
								<span style="color: red">{{ $errors->first('job_title') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="primary_billing_email" class="col-sm-2 control-label">Business Email <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="email" class="form-control" name="billing_email" value="{{ old('billing_email', optional($company)->billing_email) }}" placeholder="Enter Business Email">
								<span style="color: red">{{ $errors->first('billing_email') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="primary_billing_phone" class="col-sm-2 control-label">Direct Phone Number <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="billing_phone" value="{{ old('billing_phone', optional($company)->billing_phone) }}" placeholder="Enter Direct Phone Number">
								<span style="color: red">{{ $errors->first('billing_phone') }}</span>
							</div>
						</div>

						{{-- Billing Information (same 10 fields as Create Billing Address form) --}}
						@php
							$billingNameParts = $company && trim(optional($company)->primary_contact_name ?? '') ? explode(' ', trim($company->primary_contact_name), 2) : ['', ''];
						@endphp
						<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Billing Information (Required)</h4></div>
						<div class="form-group">
							<label for="billing_first_name" class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" autocomplete="off" class="form-control" name="billing_first_name" id="billing_first_name" value="{{ old('billing_first_name', $billingNameParts[0] ?? '') }}" placeholder="Enter first name">
								<span style="color: red">{{ $errors->first('billing_first_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="billing_last_name" class="col-sm-2 control-label">Last Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" autocomplete="off" class="form-control" name="billing_last_name" id="billing_last_name" value="{{ old('billing_last_name', $billingNameParts[1] ?? '') }}" placeholder="Enter last name">
								<span style="color: red">{{ $errors->first('billing_last_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="billing_company" class="col-sm-2 control-label">Company <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" autocomplete="off" class="form-control" name="billing_company" id="billing_company" value="{{ old('billing_company', optional($company)->name) }}" placeholder="Enter company">
								<span style="color: red">{{ $errors->first('billing_company') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="billing_country" class="col-sm-2 control-label">Country <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" autocomplete="off" class="form-control" name="billing_country" id="billing_country" value="{{ old('billing_country', optional($company)->billing_country) }}" placeholder="Enter country">
								<span style="color: red">{{ $errors->first('billing_country') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="billing_street" class="col-sm-2 control-label">Street <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="billing_address_line_1" id="billing_street" value="{{ old('billing_address_line_1', optional($company)->billing_address_line_1) }}" placeholder="Start typing address">
								<span style="color: red">{{ $errors->first('billing_address_line_1') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="billing_state" class="col-sm-2 control-label">State <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="billing_state" id="billing_state" value="{{ old('billing_state', optional($company)->state) }}" placeholder="Enter State">
								<span style="color: red">{{ $errors->first('billing_state') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="billing_town" class="col-sm-2 control-label">Town <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="billing_city" id="billing_town" value="{{ old('billing_city', optional($company)->city) }}" placeholder="Enter town">
								<span style="color: red">{{ $errors->first('billing_city') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="billing_postcode" class="col-sm-2 control-label">Postal Code <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="billing_zip_code" id="billing_postcode" value="{{ old('billing_zip_code', optional($company)->zip_code) }}" placeholder="Enter postcode">
								<span style="color: red">{{ $errors->first('billing_zip_code') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="billing_phone" class="col-sm-2 control-label">Phone <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="tel" autocomplete="off" class="form-control" name="billing_phone" id="billing_phone" value="{{ old('billing_phone', optional($company)->billing_phone) }}" placeholder="Enter phone">
								<span style="color: red">{{ $errors->first('billing_phone') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="billing_email" class="col-sm-2 control-label">Email <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="email" autocomplete="off" class="form-control" name="billing_email" id="billing_email" value="{{ old('billing_email', optional($company)->billing_email) }}" placeholder="Enter email">
								<span style="color: red">{{ $errors->first('billing_email') }}</span>
							</div>
						</div>
						<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
						@endif
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Personal Information</h4></div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Enter user name">
								<span style="color: red">{{ $errors->first('name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Last Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="{{ $user->last_name }}" name="last_name" placeholder="Enter user last name">
								<span style="color: red">{{ $errors->first('last_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="email" class="form-control" value="{{ $user->email }}" name="email" placeholder="Enter user email">
								<span style="color: red">{{ $errors->first('email') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<select name="status" id="status" class="form-control">
									<option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
									<option value="0" {{ $user->status == 0 ? 'selected' : '' }}>In-Active</option>
								</select>
								<span style="color: red">{{ $errors->first('status') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password </label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="password" placeholder="Enter password">
								<span style="color: red">{{ $errors->first('password') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Confirm Password </label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="confirm-password" placeholder="Confirm password">
								<span style="color: red">{{ $errors->first('confirm-password') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
							<input type="hidden" class="form-control" name="user_role" value="{{ $user->roles[0]->name }}">
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
			$("#regform").validate({
				rules: {
					name: "required",
					email: "required",
				}
			});
		});
	</script>
@endpush
