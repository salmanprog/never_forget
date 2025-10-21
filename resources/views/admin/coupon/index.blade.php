@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('coupon.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Coupons</h1>
	</div>
	@can('coupon-create')
	<div class="content-header-right">
		<a href="{{ route('coupon.create') }}" class="btn btn-primary btn-sm">Add Coupon</a>
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
                    <div class="row" style="margin-bottom: 10px;">
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
								<th width="30">SL</th>
								<th>Title</th>
								<th>Max Purchase</th>
								<th>Discount</th>
								<th>Coupon Code</th>
								<th>Start Date</th>
								<th>Expire Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id='body'>
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->slug }}">
									<td>{{ $models->firstItem()+$key }}.</td>
									<td>{!! \Illuminate\Support\Str::limit($model->title,40) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->max_purchase,40) !!}</td>
                                    <td>{!! \Illuminate\Support\Str::limit($model->discount,60) !!}</td>
                                    <td>{!! \Illuminate\Support\Str::limit($model->coupon_code,60) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->start_date,40) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->expire_date,60) !!}</td>
									<td>
										@if($model->status)
											<span class="badge label-success">Active</span>
										@else
											<span class="badge label-danger">In-Active</span>
										@endif
									</td>
									<td>
										@can('coupon-edit')
											<a href="{{route('coupon.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('coupon-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->slug }}" data-del-url="{{ url('coupon', $model->slug) }}"><i class="fa fa-trash"></i> Delete</button>
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
@endpush
