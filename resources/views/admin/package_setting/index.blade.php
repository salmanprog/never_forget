@extends('layouts.admin.app')
@section('content')
@section('title', 'Package / Upgrade Settings')

<section class="content-header">
	<div class="content-header-left">
		<h1>Upgrade Package Settings</h1>
	</div>
	<div class="content-header-right">
		@include('includes.buttons.back')
		<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">Website Settings</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('message'))
				<div class="callout callout-success">
					{{ session('message') }}
				</div>
			@endif
			@if ($errors->any())
				<div class="callout callout-danger">
					<ul class="mb-0">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form action="{{ route('admin.package_setting.update') }}" class="form-horizontal" method="post" accept-charset="utf-8">
				@csrf
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Configure the single upgrade package shown to company users</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label for="package_name" class="col-sm-2 control-label">Package name</label>
							<div class="col-sm-9">
								<input type="text" id="package_name" name="package_name" class="form-control" value="{{ old('package_name', $package_name) }}" placeholder="e.g. Resource Upgrade Package">
							</div>
						</div>
						<div class="form-group">
							<label for="package_amount" class="col-sm-2 control-label">Package amount ($) <span class="text-danger">*</span></label>
							<div class="col-sm-9">
								<input type="number" step="0.01" min="0" id="package_amount" name="package_amount" class="form-control" value="{{ old('package_amount', $package_amount) }}" placeholder="e.g. 99" required>
								<span class="help-block">Price company users pay for this upgrade.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="package_employees" class="col-sm-2 control-label">Number of employees <span class="text-danger">*</span></label>
							<div class="col-sm-9">
								<input type="number" min="1" id="package_employees" name="package_employees" class="form-control" value="{{ old('package_employees', $package_employees) }}" placeholder="e.g. 20" required>
								<span class="help-block">Max employees allowed after purchasing this package.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="package_clients" class="col-sm-2 control-label">Number of clients <span class="text-danger">*</span></label>
							<div class="col-sm-9">
								<input type="number" min="0" id="package_clients" name="package_clients" class="form-control" value="{{ old('package_clients', $package_clients) }}" placeholder="e.g. 10" required>
								<span class="help-block">Max clients allowed after purchasing this package.</span>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-sm-offset-2 col-sm-9">
							<button type="submit" class="btn btn-primary">Save package settings</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
