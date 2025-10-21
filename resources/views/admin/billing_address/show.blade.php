@extends('layouts.individual.app')
@section('content')

<section class="content-header">
	<div class="content-header-left">
		<h1>Show Billing Address Details</h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('billing_address.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table bordered">
					<tr>
						<th>First Name</th>
						<td>{{ $address->first_name }}</td>
					</tr>
					<tr>
						<th>Last Name</th>
						<td>{{ $address->last_name }}</td>
					</tr>
					<tr>
						<th>Company</th>
						<td>{{ $address->company }}</td>
					</tr>
					<tr>
						<th>Country</th>
						<td>{{ $address->country }}</td>
					</tr>
					<tr>
						<th>Street</th>
						<td>{{ $address->street }}</td>
					</tr>
					<tr>
						<th>Town</th>
						<td>{{ $address->town }}</td>
					</tr>
					<tr>
						<th>Postcode</th>
						<td>{{ $address->postcode }}</td>
					</tr>
					<tr>
						<th>Phone</th>
						<td>{{ $address->phone }}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{{ $address->email }}</td>
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