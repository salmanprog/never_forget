@extends('layouts.individual.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('billing_address.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Billing Address</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('billing_address.create') }}" class="btn btn-primary btn-sm">Add Billing Address</a>
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
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-7">
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
								<th>Full Name</th>
								<th>Company</th>
								<th>Country</th>
								<th>Street</th>
								<th>Town</th>
								<th>Postcode</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Status</th>
								<th width="100">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->id }}">
									<td>{{ $models->firstItem()+$key }}.</td>
									<td>{{ $model->first_name }} {{ $model->last_name }}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->company,20) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->country,30) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->street,50) !!}</td> 
									<td>{!! \Illuminate\Support\Str::limit($model->town,50) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->postcode,50) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->phone,50) !!}</td>
									<td>{!! \Illuminate\Support\Str::limit($model->email,50) !!}</td>
									<td>
										@if($model->status)
											<span class="label label-success">Active</span>
										@else
											<span class="label label-danger">In-Active</span>
										@endif
									</td>
									<td width="250px">
										<a href="{{route('billing_address.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit post" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('billing_address', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="9">
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
