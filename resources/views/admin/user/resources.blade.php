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
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        @include('includes.buttons.back')
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-sm-6">
                            <span class="badge label-primary" style="font-size: 14px; padding: 8px 12px;">Employees: {{ $employeesCount }}</span>
                        </div>
                        <div class="col-sm-6">
                            <span class="badge label-info" style="font-size: 14px; padding: 8px 12px;">Clients: {{ $clientsCount }}</span>
                        </div>
                    </div>
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
                                @forelse($employees as $key => $employee)
                                    <tr>
                                        <td>{{ $employees->firstItem() + $key }}.</td>
                                        <td>
                                            <span class="badge {{ $employee->type == 'employee' ? 'label-primary' : 'label-info' }}">
                                                {{ ucfirst($employee->type) }}
                                            </span>
                                        </td>
                                        <td>{{ $employee->client_status ?? '—' }}</td>
                                        <td>{{ $employee->client_since ?? '—' }}</td>
                                        <td>{{ $employee->department ?? '—' }}</td>
                                        <td>{{ $employee->employee_id ?? '—' }}</td>
                                        <td>{{ $employee->job_title ?? '—' }}</td>
                                        <td>{{ $employee->hire_date ? \Carbon\Carbon::parse($employee->hire_date)->format('M d, Y') : '—' }}</td>
                                        <td>{{ $employee->employment_status ?? '—' }}</td>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->shipping_address ?? '—' }}</td>
                                        <td>{{ $employee->city ?? '—' }}</td>
                                        <td>{{ $employee->state ?? '—' }}</td>
                                        <td>{{ $employee->zip ?? '—' }}</td>
                                        <td>{{ $employee->date_of_birth ? \Carbon\Carbon::parse($employee->date_of_birth)->format('M d, Y') : '—' }}</td>
                                        <td>{{ $employee->work_anniversary_date ? \Carbon\Carbon::parse($employee->work_anniversary_date)->format('M d, Y') : '—' }}</td>
                                        <td>{{ $employee->favorite_color ?? '—' }}</td>
                                        <td>{{ $employee->hobbies ?? '—' }}</td>
                                        <td>{{ $employee->dietry_restriction ?? '—' }}</td>
                                        <td>{{ $employee->budget_range ?? '—' }}</td>
                                        <td>{{ $employee->gift_preferences ?? '—' }}</td>
                                        <td>{{ $employee->occasion ?? '—' }}</td>
                                        <td>{{ $employee->gift_send_date ? \Carbon\Carbon::parse($employee->gift_send_date)->format('M d, Y') : '—' }}</td>
                                        <td>{{ $employee->payment_method ?? '—' }}</td>
                                        <td>{{ $employee->tracking_number ?? '—' }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($employee->delivery_notes ?? '', 30) }}</td>
                                        <td>
                                            <select class="form-control input-sm delivery-status-select" data-employee-id="{{ $employee->id }}" data-user-id="{{ $companyUser->id }}" style="min-width: 100px;">
                                                <option value="pending" {{ ($employee->delivery_status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="shipped" {{ ($employee->delivery_status ?? '') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="delivered" {{ ($employee->delivery_status ?? '') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                <option value="cancelled" {{ ($employee->delivery_status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($employee->notes ?? '', 30) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="30" class="text-center">No resources found.</td>
                                    </tr>
                                @endforelse
                                @if($employees->count() > 0)
                                    <tr>
                                        <td colspan="30">
                                            Displaying {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of {{ $employees->total() }} records
                                            <div class="d-flex justify-content-center">
                                                {!! $employees->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
$(function() {
    $('.delivery-status-select').on('change', function() {
        var select = $(this);
        var userId = select.data('user-id');
        var employeeId = select.data('employee-id');
        var status = select.val();
        var url = '{{ url("user") }}/' + userId + '/resources/' + employeeId + '/delivery-status';
        $.ajax({
            url: url,
            type: 'PATCH',
            data: { delivery_status: status, _token: '{{ csrf_token() }}' },
            success: function() {},
            error: function() { select.val(select.data('prev') || 'pending'); }
        });
        select.data('prev', status);
    });
});
</script>
@endpush
