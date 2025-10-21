@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('styles.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Styles</h1>
	</div>
	@can('styles-create')
        <div class="content-header-right">
            <a href="{{ route('styles.create') }}" class="btn btn-primary btn-sm">Add Style</a>
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
                            <input type="text" id="search" class="form-control" placeholder="Search by title">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select name="" id="status" class="form-control status" style="margin-bottom:10px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>SL</th>
								<th>Image</th>
								<th>Title</th>
								<th>Heading</th>
								<th>Description</th>
								<th>Description Images</th>
								<th>Back Image</th>
								<th>Frame Image</th>
								<th>Have Sub Style</th>
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
										@if($model->image)
											<img src="{{ asset('public/admin/assets/images/styles/'.$model->image) }}" alt="" style="width:60px;">
										@else
											<img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:60px;">
										@endif
									</td>
									<td>{{\Illuminate\Support\Str::limit($model->title,60)}}</td>
                                    <td>{!! $model->heading ? \Illuminate\Support\Str::limit($model->heading, 60) : 'N/A' !!}</td>
									<td>{!! $model->description ? \Illuminate\Support\Str::limit($model->description, 60) : 'N/A' !!}</td>

                                    <td>
                                        <div class="image-slider">
                                            @if (!empty($model->description_images))
                                                @foreach (json_decode($model->description_images) as $image)
                                                    <img class="slider-image" src="{{ asset('public/admin/assets/images/styles/description-image/' . $image) }}" alt="">
                                                @endforeach
                                            @else
                                                <img style="width: 80px" id="banner_previewww" src="{{ asset('public/admin/assets/images/default.jpg') }}" alt="Image Not Found">
                                            @endif
                                        </div>
                                    </td>

                                    <td>
										@if($model->back_image)
											<img src="{{ asset('public/admin/assets/images/styles/back-image/'.$model->back_image) }}" alt="" style="width:60px;">
										@else
											<img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:60px;">
										@endif
									</td>
                                    <td>
										@if($model->frame_image)
											<img src="{{ asset('public/admin/assets/images/styles/frame-image/'.$model->frame_image) }}" alt="" style="width:60px;">
										@else
											<img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:60px;">
										@endif
									</td>
                                    <td>
										@if($model->sub_style)
											<span class="label label-info">{{isset($model->hasSubStyle)?$model->hasSubStyle->title:'N/A'}}</span>
										@else
											<span class="badge badge-danger">No Sub Style</span>
										@endif
									</td>
									<td>
										@if($model->status)
                                            <span class="badge label-success">Active</span>
                                        @else
                                            <span class="badge label-danger">In-Active</span>
										@endif
									</td>
                                    <td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
									<td width="250px">
										@can('styles-edit')
											<a href="{{route('styles.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Style" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('styles-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('styles', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="12">
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
