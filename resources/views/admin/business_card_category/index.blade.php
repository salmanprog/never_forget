@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('business_card_categories.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Business Card Categories</h1>
	</div>
	@can('business_card_categories-create')
        <div class="content-header-right">
            <a href="{{ route('business_card_categories.create') }}" class="btn btn-primary btn-sm">Add business card category</a>
        </div>
	@endcan
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
                    <div class="row" style="margin-bottom: 10px;">
                        {{-- <div class="col-sm-1">Search:</div> --}}
                        <div class="d-flex col-sm-8">
                            <input type="text" id="search" class="form-control" placeholder="Search by Title">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Title</th>
								<th>Parent Category</th>
								{{-- <th>Image</th> --}}
								<th>Status</th>
								<th>Created by</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->id }}">
									<td>{{ $models->firstItem()+$key }}.</td>

									<td>{{\Illuminate\Support\Str::limit($model->title,40)}}</td>
									<td>
										@if($model->parent_id)
											<span class="label label-warning">{{$model->hasParent->title??'N/A'}}</span>
										@else
											<span class="label label-info">No Parent</span>
										@endif
									</td>
									{{-- <td>
										@if($model->image)
											<img src="{{ asset('public/admin/assets/images/business_card_categories/'.$model->image) }}" alt="" style="width:60px;">
										@else
											<img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:60px;">
										@endif
									</td> --}}
									<td>
										@if($model->status)
                                            <span class="badge label-success">Active</span>
										@else
											<span class="badge label-danger">In-Active</span>
										@endif
									</td>
                                    <td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
									<td width="250px">
										@can('business_card_categories-edit')
											<a href="{{route('business_card_categories.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit business card category" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('business_card_categories-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('business_card_categories', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
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
@endpush
