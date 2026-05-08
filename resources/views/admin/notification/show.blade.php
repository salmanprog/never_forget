@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    }elseif (Auth::user()->hasRole('Sales Person')) {
        $layout = 'layouts.sales-person.app';
    } else {
        $layout = 'layouts.sales-person.app';
    }
@endphp

@extends($layout)
@section('title', $page_title)
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Notification Details</h1>
	</div>
	<div class="content-header-right">
		<!-- <a href="{{ route('notification.index') }}" class="btn btn-primary btn-sm">View All</a> -->
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-2 control-label">Name:</label>
						<div class="col-sm-9">
							<p>{{ $model->user->name ?? 'N/A' }} ({{ $model->user->email ?? 'N/A' }})</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Title:</label>
						<div class="col-sm-9">
							<p>{{ $model->title }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Description:</label>
						<div class="col-sm-9">
							<p>{{ $model->description ?? 'N/A' }}</p>
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-2 control-label">Module:</label>
						<div class="col-sm-9">
							<p>{{ $model->module ?? 'N/A' }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Module ID:</label>
						<div class="col-sm-9">
							<p>{{ $model->module_id ?? 'N/A' }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Module Slug:</label>
						<div class="col-sm-9">
							<p>{{ $model->module_slug ?? 'N/A' }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Reference Module:</label>
						<div class="col-sm-9">
							<p>{{ $model->reference_module ?? 'N/A' }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Reference ID:</label>
						<div class="col-sm-9">
							<p>{{ $model->reference_id ?? 'N/A' }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Reference Slug:</label>
						<div class="col-sm-9">
							<p>{{ $model->reference_slug ?? 'N/A' }}</p>
						</div>
					</div> -->
					<!-- <div class="form-group">
						<label class="col-sm-2 control-label">Read Status:</label>
						<div class="col-sm-9">
							@if($model->is_read)
								<span class="badge label-success">Read</span>
							@else
								<span class="badge label-warning">Unread</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">View Status:</label>
						<div class="col-sm-9">
							@if($model->is_view)
								<span class="badge label-success">Viewed</span>
							@else
								<span class="badge label-danger">Not Viewed</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Created At:</label>
						<div class="col-sm-9">
							<p>{{ $model->created_at->format('M d, Y H:i:s') }}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Updated At:</label>
						<div class="col-sm-9">
							<p>{{ $model->updated_at->format('M d, Y H:i:s') }}</p>
						</div>
					</div> -->
					<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-9">
							@can('notification-edit')
								<a href="{{route('notification.edit', $model->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
							@endcan
							<a href="{{ route('dashboard') }}" class="btn btn-default btn-sm">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

