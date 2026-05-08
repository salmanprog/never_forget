@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('blog.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Blogs</h1>
	</div>
	@can('blog-create')
	<div class="content-header-right">
		<a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">Add Blog</a>
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
			@if (session('message'))
				<div class="callout callout-success">
					{{ session('message') }}
				</div>
			@endif

			<div class="box box-info">
				<div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-5">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Image</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->id }}">
									<td>{{ $models->firstItem()+$key }}.</td>
									<td>
										@if($model->image)
											<img src="{{ asset('public/admin/assets/posts/'.$model->image) }}" alt="" style="width:60px; height:60px; object-fit:cover;">
										@else
											<img src="{{ asset('public/admin/assets/img/no-photo1.jpg') }}" style="width:60px;">
										@endif
									</td>
									<td>{!! \Illuminate\Support\Str::limit($model->title,40) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit(strip_tags($model->description),60) !!}</td>
									<td>
										@if($model->status)
											<span class="badge badge-success">Active</span>
										@else
											<span class="badge badge-danger">In-Active</span>
										@endif
									</td>
									<td width="250px">
										@can('blog-edit')
											<a href="{{route('blog.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit blog" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('blog-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('blog', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="7">
									Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
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
		$("#search").keyup(function() {
			var value = $(this).val();
			if(value.length > 2 || value.length == 0) {
				$.ajax({
					url: "{{ route('blog.index') }}",
					type: "GET",
					data: {
						search: value,
						status: $("#status").val()
					},
					success: function(data) {
						$("#body").html(data);
					}
				});
			}
		});

		$("#status").change(function() {
			var value = $(this).val();
			$.ajax({
				url: "{{ route('blog.index') }}",
				type: "GET",
				data: {
					search: $("#search").val(),
					status: value
				},
				success: function(data) {
					$("#body").html(data);
				}
			});
		});

		$(".delete").click(function() {
			var slug = $(this).attr("data-slug");
			var del_url = $(this).attr("data-del-url");
			if (confirm("Are you sure you want to delete this blog?")) {
				$.ajax({
					url: del_url,
					type: "DELETE",
					data: {
						_token: "{{ csrf_token() }}"
					},
					success: function(response) {
						if(response) {
							$("#id-"+slug).fadeOut();
							alert("Blog deleted successfully");
						} else {
							alert("Failed to delete blog");
						}
					}
				});
			}
		});
	});
</script>
@endpush
