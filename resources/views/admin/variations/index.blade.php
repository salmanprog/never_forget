@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('variations.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Variations</h1>
	</div>
	@can('variations-create')
        <div class="content-header-right">
            <a href="{{ route('variations.create') }}" class="btn btn-primary btn-sm">Add Variations</a>
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
					<table id="" class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th width="30">SL</th> 
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($variations as $key=>$variation)
								<tr id="id-{{ $variation->id }}">
									<td>{{ $variations->firstItem()+$key }}.</td>
									<td>{!! $variation->name !!}</td>
									<td>
										@if($variation->status)
                                            <span class="badge label-success">Active</span>
										@else
											<span class="badge label-danger">In-Active</span>
										@endif
									</td>
									<td>
										@can('variations-edit')
											<a href="{{route('variations.edit', $variation->id)}}" data-toggle="tooltip" data-placement="top" title="Edit variation" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('variations-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $variation->id }}" data-del-url="{{ url('variations', $variation->id) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="6">
									Displying {{$variations->firstItem()}} to {{$variations->lastItem()}} of {{$variations->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $variations->links('pagination::bootstrap-4') !!}
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
