@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('notification.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Notifications</h1>
	</div>
	@can('notification-create')
	<div class="content-header-right">
		<a href="{{ route('notification.create') }}" class="btn btn-primary btn-sm">Add Notification</a>
	</div>
	@endcan
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('message'))
				<div class="callout callout-success">
					{{ session('message') }}
				</div>
			@endif
			@if (session('error'))
				<div class="callout callout-danger">
					{{ session('error') }}
				</div>
			@endif

			<div class="box box-info">
				<div class="box-body">
                    <div class="row" style="margin-bottom:10px">
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search by title, description, or module">
                        </div>
                        <div class="d-flex col-sm-3">
                            <select name="" id="user_id" class="form-control" style="margin-bottom:5px">
                                <option value="All" selected>All Users</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex col-sm-3">
                            <select name="" id="is_read" class="form-control" style="margin-bottom:5px">
                                <option value="All" selected>All Status</option>
                                <option value="1">Read</option>
                                <option value="0">Unread</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>User</th>
								<th>Title</th>
								<th>Description</th>
								<th>Module</th>
								<th>Read Status</th>
								<th>View Status</th>
								<th>Created At</th>
								<th width="200">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->id }}">
									<td>{{ $models->firstItem()+$key }}.</td>
									<td>{{ $model->user->name ?? 'N/A' }}<br><small>{{ $model->user->email ?? '' }}</small></td>
									<td>{{\Illuminate\Support\Str::limit($model->title, 40)}}</td>
									<td>{{\Illuminate\Support\Str::limit($model->description, 50)}}</td>
									<td>{{ $model->module ?? 'N/A' }}</td>
									<td>
										@if($model->is_read)
											<span class="badge label-success">Read</span>
										@else
											<span class="badge label-warning">Unread</span>
										@endif
									</td>
									<td>
										@if($model->is_view)
											<span class="badge label-success">Viewed</span>
										@else
											<span class="badge label-danger">Not Viewed</span>
										@endif
									</td>
									<td>{{ $model->created_at->format('M d, Y H:i') }}</td>
									<td width="200px">
										<a href="{{route('notification.show', $model->id)}}" data-toggle="tooltip" data-placement="top" title="View notification" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
										@can('notification-edit')
											<a href="{{route('notification.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit notification" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('notification-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('notification', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="9">
                                    <div class="d-flex justify-content-center">
                                        {!! $models->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('js')
<script>
	$(document).ready(function() {
		$("#search, #user_id, #is_read").on('keyup change', function(){
			var search = $("#search").val();
			var user_id = $("#user_id").val();
			var is_read = $("#is_read").val();
			var page_url = $("#page_url").val();
			var base_url = page_url;
			var url = base_url + "?search=" + search + "&user_id=" + user_id + "&is_read=" + is_read;
			$.ajax({
				url: url,
				type: "GET",
				success: function(response){
					$("#body").html(response);
				}
			});
		});

		//delete record
		$('.delete').on('click', function(){
			var slug = $(this).attr('data-slug');
			var delete_url = $(this).attr('data-del-url');
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url : delete_url,
						type : 'DELETE',
						success : function(response){
							if(response){
								$('#id-'+slug).hide();
								Swal.fire(
									'Deleted!',
									'Your notification has been deleted.',
									'success'
								)
							}else{
								Swal.fire(
									'Not Deleted!',
									'Sorry! Something went wrong.',
									'danger'
								)
							}
						}
					});
				}
			})
		});
	});
</script>
@endpush

