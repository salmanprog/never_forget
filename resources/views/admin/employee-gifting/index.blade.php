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
		<h1>Resource Gifting</h1>
	</div>
	@can('order-create')
	<div class="content-header-right">
		{{-- <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm">Add order</a> --}}
	</div>
	@endcan
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Contact Type</th>
                            <th>Client Status</th>
                            <th>Client Since</th>
                            <th>Department</th>
                            <th>Employee ID</th>
                            <th>Job Title</th>
                            <th>Hire Date</th>
                            <th>Employment Status</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Shipping Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip</th>
                            <th>DOB</th>
                            <th>Work Anniversary Date</th>
                            <th>Favorite Color</th>
                            <th>Hobbies</th>
                            <th>Dietry Restriction</th>
                            <th>Budget Range</th>
                            <th>Gift Preferences</th>
                            <th>Occasion</th>
                            <th>Gift Sent Date</th>
                            <th>Payment Method</th>
                            <th>Tracking Number</th>
                            <th>Delivery Note</th>
                            <th>Delivery Status</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sentGifts as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>
                                    <span class="badge {{ $row->type == 'employee' ? 'label-primary' : 'label-info' }}">
                                        {{ ucfirst($row->type) }}
                                    </span>
                                </td>
                                <td>{{ $row->client_status ?? '—' }}</td>
                                <td>{{ $row->client_since ?? '—' }}</td>
                                <td>{{ $row->department ?? '—' }}</td>
                                <td>{{ $row->employee_id ?? '—' }}</td>
                                <td>{{ $row->job_title ?? '—' }}</td>
                                <td>{{ $row->hire_date ? \Carbon\Carbon::parse($row->hire_date)->format('M d, Y') : '—' }}</td>
                                <td>{{ $row->employment_status ?? '—' }}</td>
                                <td>{{ $row->first_name }}</td>
                                <td>{{ $row->last_name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->shipping_address ?? '—' }}</td>
                                <td>{{ $row->city ?? '—' }}</td>
                                <td>{{ $row->state ?? '—' }}</td>
                                <td>{{ $row->zip ?? '—' }}</td>
                                <td>{{ $row->date_of_birth ? \Carbon\Carbon::parse($row->date_of_birth)->format('M d, Y') : '—' }}</td>
                                <td>{{ $row->work_anniversary_date ? \Carbon\Carbon::parse($row->work_anniversary_date)->format('M d, Y') : '—' }}</td>
                                <td>{{ $row->favorite_color ?? '—' }}</td>
                                <td>{{ $row->hobbies ?? '—' }}</td>
                                <td>{{ $row->dietry_restriction ?? '—' }}</td>
                                <td>{{ $row->budget_range ?? '—' }}</td>
                                <td>{{ $row->gift_preferences ?? '—' }}</td>
                                <td>{{ $row->occasion ?? '—' }}</td>
                                <td>{{ $row->gift_send_date ? \Carbon\Carbon::parse($row->gift_send_date)->format('M d, Y') : '—' }}</td>
                                <td>{{ $row->payment_method ?? '—' }}</td>
                                <td>{{ $row->tracking_number ?? '—' }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($row->delivery_notes ?? '', 30) }}</td>
                                <td>{{ ucfirst($row->delivery_status ?? '—') }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($row->notes ?? '', 30) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="29" class="text-center">No sent gifts yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
@endpush

