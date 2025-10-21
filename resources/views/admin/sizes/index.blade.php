@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('sizes.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Sizes</h1>
	</div>
	@can('sizes-create')
        <div class="content-header-right">
            <a href="{{ route('sizes.create') }}" class="btn btn-primary btn-sm">Add Sizes</a>
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
                       {{--  <div class="col-sm-1">Search:</div> --}}
                        <div class="d-flex col-sm-8">
                            <input type="text" id="search" class="form-control" placeholder="Search By Sizes">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select name="" id="status" class="form-control status" style="margin-bottom:10px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>#No.</th>
								<th>Sizes</th>
								<th>Status</th>
                                <th>Created by</th>
								<th width="220">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($sizes as $key=>$size)
								<tr id="id-{{ $size->id }}">
									<td>{{ $sizes->firstItem()+$key }}.</td>
                                    <td>{{\Illuminate\Support\Str::limit($size->sizes??'N/A',60)}}</td>
									<td>
                                        @if($size->status)
                                            <span class="badge label-success">Active</span>
                                        @else
                                            <span class="badge label-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td>{{isset($size->hasCreatedBy)?$size->hasCreatedBy->name:'N/A'}}</td>
                                    <td>
										@can('sizes-edit')
											<a href="{{route('sizes.edit', $size->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Sizes" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('sizes-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $size->id }}" data-del-url="{{ url('sizes', $size->id) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="5">
									Displying {{$sizes->firstItem()}} to {{$sizes->lastItem()}} of {{$sizes->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $sizes->links('pagination::bootstrap-4') !!}
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
@endpush
