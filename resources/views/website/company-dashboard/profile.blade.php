@extends('layouts.company.app')
@section('title', $page_title)
<style>
	.form-control {
		margin-bottom: 20px;
	}
	.alert {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.custom-alert-warning {
		background-color: #cfa40c !important;
		color: #fff !important;
	}
</style>
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Company Profile</h1>
	</div>
	<div class="content-header-right">
		@include('includes.buttons.back')
		<a href="{{ route('company.profile.edit') }}" class="btn btn-primary btn-sm">Edit Profile</a>
	</div>
</section>

<section class="content">
	<div class="row">
		@if (!$company)
			<div class="callout custom-alert-warning">
				<p>No company profile found. <a href="{{ route('company.profile.edit') }}">Complete your profile</a> to add company information.</p>
			</div>
		@else
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					{{-- Basic Company Information --}}
					<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Basic Company Information</h4></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Company Name <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->name ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Registration Number</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->registration_number ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Industry</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->industry ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Company Website</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->website ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Year Established</label>
						<div class="col-sm-9">
							@php
								$yearDisplay = $company->year_established ?? '';
								try {
									if ($yearDisplay && strlen($yearDisplay) <= 4 && preg_match('/^\d{4}$/', $yearDisplay)) {
										$yearDisplay = \Carbon\Carbon::createFromFormat('Y', $yearDisplay)->format('F Y');
									} elseif ($yearDisplay && preg_match('/^\d{4}-\d{2}-\d{2}$/', $yearDisplay)) {
										$yearDisplay = \Carbon\Carbon::parse($yearDisplay)->format('F j, Y');
									}
								} catch (\Exception $e) {
									// keep original value if not a valid date
								}
							@endphp
							<input type="text" class="form-control" readonly value="{{ $yearDisplay }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Number of Employees <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->number_of_employees ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Company Logo (upload) <span style="color: red">*</span></label>
						<div class="col-sm-6" style="padding-top:5px">
							@if(!empty($company->logo))
								<img style="max-width: 80px; max-height: 80px;" src="{{ asset('public/admin/assets/images/company-logos/' . $company->logo) }}?v={{ $company->updated_at ? $company->updated_at->timestamp : time() }}" alt="Company Logo">
							@else
								<input type="text" class="form-control" readonly value="—" style="background-color: #fff; cursor: default;">
							@endif
						</div>
					</div>

					{{-- Primary Contact Information --}}
					<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
					<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Primary Contact Information</h4></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->primary_contact_name ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Job Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->job_title ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Business Email <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->billing_email ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Direct Phone Number <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->billing_phone ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					{{-- Billing Information (same 10 fields as Create Billing Address form) --}}
					@php
						$billingNameParts = $company && trim($company->primary_contact_name ?? '') ? explode(' ', trim($company->primary_contact_name), 2) : ['', ''];
					@endphp
					<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
					<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Billing Information (Required)</h4></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $billingNameParts[0] ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $billingNameParts[1] ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Company</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->name ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Country</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->billing_country ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Street</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->billing_address_line_1 ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">State</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->state ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Town</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->city ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Postal Code</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->zip_code ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->billing_phone ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $company->billing_email ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>

					{{-- Personal Information --}}
					<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
					<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Personal Information</h4></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $user->name ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $user->last_name ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $user->email ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Phone Number</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="{{ $user->phone ?? '' }}" style="background-color: #fff; cursor: default;">
						</div>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>
</section>
@endsection
