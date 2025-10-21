@extends('layouts.admin.app')
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Show Business Card Category Details</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('business_card_category.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table bordered">
					{{-- <tr>
						<th>Image</th>
						<td>
							@if($business_card_category->image)
								<img src="{{ asset('public/admin/assets/images/business_card_categories') }}/{{ $business_card_category->image }}" alt="Slider Image" height="400px" width="500px">
							@else 
								<img src="{{ asset('public/admin/assets/images/services/no-photo1.jpg') }}" alt="Slider Image" height="400px" width="500px">
							@endif
						</td>
					</tr> --}}
					<tr>
						<th>Parent Category</th>
						<td>
							@if($business_card_category->parent_id)
								<span class="badge badge-success">{{ $business_card_category->hasParent->title }}</span>
							@else 
								<span class="badge badge-danger">No Parent</span>
							@endif
						</td>
					</tr>
					<tr>
						<th>Title</th>
						<td><span class="badge badge-success">{{ $business_card_category->title }}</span></td>
					</tr> 
					 
					<tr>
						<th>Status</th>
						<td>
							@if($business_card_category->status)
								<span class="badge badge-success">Active</span>
							@else 
								<span class="badge badge-danger">In-Active</span>
							@endif
						</td>
					</tr>
					<tr>
						<th>Date</th>
						<td>
							<span class="badge badge-success">{{ date('d, F-Y H:i:s A', strtotime($business_card_category->created_at)) }}</span>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('.editor_short').summernote({
			height: 150
		});
	});
</script>
@endsection