@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('catering_service.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Catering Services</h1>
	</div>
	{{-- @can('catering_service-create')
        <div class="content-header-right">
            <a href="{{ route('catering_service.create') }}" class="btn btn-primary btn-sm">Add Catering Service</a>
        </div>
	@endcan --}}
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
                    <div class="row" style="margin-bottom:10px">

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
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>First Image</th>
								<th>Second Image</th>
								<th>First Title</th>
								<th>Second Title</th>
								<th>Heading</th>
								<th>Description</th>
								<th>Status</th>
								<th>Created by</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->id }}">
									<td>{{ $models->firstItem()+$key }}.</td>
                                    <td>
										@if($model->first_image)
											<img src="{{ asset('public/admin/assets/images/catering/'.$model->first_image) }}" alt="" style="width:100px;">
										@else
											<img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:100px;">
										@endif
									</td>
                                    <td>
										@if($model->second_image)
											<img src="{{ asset('public/admin/assets/images/catering/'.$model->second_image) }}" alt="" style="width:100px;">
										@else
											<img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:100px;">
										@endif
									</td>
									<td>{{\Illuminate\Support\Str::limit($model->first_title??'N/A',60)}}</td>
									<td>{{\Illuminate\Support\Str::limit($model->second_title??'N/A',60)}}</td>
									<td>{{\Illuminate\Support\Str::limit($model->heading??'N/A',60)}}</td>
									<td>{!!\Illuminate\Support\Str::limit($model->description??'N/A',60)!!}</td>
									<td>
										@if($model->status)
											<span class="badge label-success">Active</span>
										@else
											<span class="badge label-danger">In-Active</span>
										@endif
									</td>
                                    <td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
									<td width="250px">
										@can('catering_service-edit')
											<a href="{{route('catering_service.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit AboutUs" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										{{-- @can('catering_service-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('catering_service', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan --}}
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
@endpush
