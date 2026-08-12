@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('collaborator.index') }}">	
<section class="content-header">
	<div class="content-header-left">
		<h1>{{ $page_title }}</h1>
	</div>
	@can('collaborator-create')
	<div class="content-header-right">
		@include('includes.buttons.back')
		<a href="{{ route('collaborator.create') }}" class="btn btn-primary btn-sm">{{ $page_title }}</a>
	</div>
	@endcan
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
						{{-- <div class="col-sm-1">Search:</div> --}}
						<div class="d-flex col-sm-8">
							<input type="text" id="search" class="form-control" placeholder="Search">
						</div>
						<div class="d-flex col-sm-4">
							<select name="" id="status" class="form-control status" style="margin-bottom:5px">
								<option value="All" selected>Search by status</option>
								<option value="1">Active</option>
								<option value="2">In-Active</option>
							</select>
						</div>
					</div>
					<div class="table-responsive p-0">
						<table id="" class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>SL</th>
									<th>Image</th>
									<th>Title</th>
									<th>Slug</th>
									<th>Status</th>
									<th>Created by</th>
									<th width="140">Action</th>
								</tr>
							</thead>
							<tbody id="body">
								@include('admin.collaborators.search')
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('js')
@endpush