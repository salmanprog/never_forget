@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
	<section class="content-header">
		<div class="content-header-left">
			<h1>Add Salesperson</h1>
		</div>
		<div class="content-header-right">
			<a href="{{ route('user.index', ['type' => 'salesperson']) }}" class="btn btn-primary btn-sm">View All Salesperson</a>
		</div>
	</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('user.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<div class="box box-info">
					<div class="box-body">
						{{-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">Roles <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<select name="roles" id="" class="form-control">
									<option value="" selected>Select role</option>
									@foreach ($roles as $role)
										<option value="{{ $role->id }}" {{ old('roles')==$role->id?'selected':'' }}>{{ $role->name }}</option>
									@endforeach
								</select>
								<span style="color: red">{{ $errors->first('name') }}</span>
							</div>
						</div> --}}
						
						<div class="form-group">
							{{-- <label for="" class="col-sm-2 control-label">Role Name <span style="color: red">*</span></label> --}}
							<div class="col-sm-8">
								<input type="hidden" class="form-control" value="{{ optional($salesperson_roles->first())->name ?? 'Sales Person' }}" name="account_type" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" placeholder="Enter user first name">
								<span style="color: red">{{ $errors->first('first_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Last Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" placeholder="Enter user last name">
								<span style="color: red">{{ $errors->first('last_name') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Enter user email">
								<span style="color: red">{{ $errors->first('email') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="tel" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Enter user phone">
								<span style="color: red">{{ $errors->first('phone') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Address <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="{{ old('address') }}" name="address" placeholder="Enter user address">
								<span style="color: red">{{ $errors->first('address') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="password" placeholder="Enter password">
								<span style="color: red">{{ $errors->first('password') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Confirm Password <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="confirm-password" placeholder="Confirm password">
								<span style="color: red">{{ $errors->first('confirm-password') }}</span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
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
					password: "required",
					confirm_password: "required",
				}
			});
		});
	</script>
@endpush
