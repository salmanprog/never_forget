@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } else {
        $layout = 'layouts.company.app';
    }
@endphp

@extends($layout)

{{-- @section('title', $page_title) --}}
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1>Employee Gifting</h1>
	</div>
	@can('order-create')
	<div class="content-header-right">
		{{-- <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm">Add order</a> --}}
	</div>
	@endcan
</section>
<section class="content">

    <div class="box box-info" style="padding: 20px;">
        <h3>upload or manage recipient lists (for appreciation campaigns).</h3>
    </div>
</section>
@endsection
@push('js')
@endpush

