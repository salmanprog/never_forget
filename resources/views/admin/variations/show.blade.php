@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('variations.index') }}">
<section class="content-header">
        <div class="content-header-left">
            <h1>All Mediums of {{ $product->name }}</h1>
        </div>
        @can('variations-create')
            <div class="content-header-right">
                <a href="{{ route('variations.create',['slug'=>$product->slug]) }}" class="btn btn-primary btn-sm">Add Variations</a>
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
                    
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Medium Name</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($models as $key=>$model)
								<tr id="id-{{ $model->id }}">
									<td>{{ $models->firstItem()+$key }}.</td>
                                    <td>{{isset($model->hasProduct)?$model->hasProduct->name:'N/A'}}</td>
                                    <td>{{isset($model->hasMedium)?$model->hasMedium->title:'N/A'}}</td>
									<td>
										@if($model->status)
                                            <span class="badge label-success">Active</span>
                                        @else
                                            <span class="badge label-danger">In-Active</span>
										@endif
									</td> 
									<td width="250px">
										<a href="{{ route('variations.index',  ['product_id'=>$model->product_id,'medium_id'=>$model->medium_id]) }}" data-toggle="tooltip" data-placement="top" title="View Variations" class="btn btn-info btn-xs">View Variations</a>
									</td> 
								</tr>
							@endforeach
                            <tr>
                                <td colspan="12">
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
