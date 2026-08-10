@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('contactus.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>{{$page_title}}</h1>
	</div>
	<div class="content-header-right">
		@include('includes.buttons.back')
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('status'))
				<div class="callout callout-success">
					{{ session('status') }}
				</div>
			@endif

			<div class="box box-info">
				<div class="box-body">
                    <div class="row">
                        <div class="d-flex col-sm-4">
                            <input type="text" id="search" class="form-control" placeholder="Search name, email, company, phone">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select name="" id="type" class="form-control type" style="margin-bottom:5px">
                                <option value="All" selected>Search by type</option>
                                <option value="custom_quote">Custom Quote</option>
                                <option value="request_a_quote">Request a Quote</option>
                                <option value="customize_solution">Customize Your Solution</option>
                            </select>
                        </div>
                        <div class="d-flex col-sm-4">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Type</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Company</th>
								<th>Plans</th>
								<th>Details</th>
								<th>Status</th>
								<th>Contacts</th>
								<th width="100">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@include('admin.contact_us.search')
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="contactDetailModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Contact / Custom Solution Details</h4>
			</div>
			<div class="modal-body" id="contactDetailBody"></div>
		</div>
	</div>
</div>

@include('includes.admin.mts-modals')
@endsection

@push('js')
@include('includes.admin.mts-functions')
<script>
	$(document).on('click', '.view-contact-detail', function () {
		var b64 = $(this).attr('data-detail-b64') || '';
		try {
			$('#contactDetailBody').html(decodeURIComponent(escape(atob(b64))));
		} catch (e) {
			$('#contactDetailBody').html(atob(b64));
		}
		$('#contactDetailModal').modal('show');
	});
</script>
@endpush
