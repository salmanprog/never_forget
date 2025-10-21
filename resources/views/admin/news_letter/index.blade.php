@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('newsletter.index') }}">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Subscribers</h1>
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
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="d-flex col-sm-8">
                            <input type="text" id="search" class="form-control" placeholder="Search by Email">
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
								<!-- <th>Name</th> -->
								<th>Email</th>
								<th>Status</th>
								<th width="180">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							@foreach($news_letters as $key=>$news_letter)
								<tr id="id-{{ $news_letter->id }}">
									<td>{{ $news_letters->firstItem()+$key }}.</td>
									<!-- <td>{{$news_letter->name}}</td> -->
									<td>{{$news_letter->email}}</td>
									<td>
										@if($news_letter->status)
                                            <span class="badge label-success">Active</span>
                                        @else
                                            <span class="badge label-danger">In-Active</span>
										@endif
									</td>
									<td>
										@can('newsletter-edit')
											<a href="{{route('newsletter.edit', $news_letter->id)}}" data-toggle="tooltip" data-placement="top" title="Edit NewsLetter" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										@endcan
										@can('newsletter-delete')
                                            <button class="btn btn-danger btn-xs delete" data-slug="{{ $news_letter->id }}" data-del-url="{{ url('newsletter', $news_letter->id) }}"><i class="fa fa-trash"></i> Delete</button>
										@endcan
									</td>
								</tr>
							@endforeach
                            <tr>
                                <td colspan="6">
									Displying {{$news_letters->firstItem()}} to {{$news_letters->lastItem()}} of {{$news_letters->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $news_letters->links('pagination::bootstrap-4') !!}
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
