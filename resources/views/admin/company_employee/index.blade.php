@extends('layouts.company.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('admin.company_employee.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>Company Resources</h1>
    </div>
    <div class="content-header-right">
        @if($company)
            <!-- <a href="{{ route('admin.company.edit') }}" class="btn btn-info btn-sm">Edit Company</a> -->
            @include('includes.buttons.back')
            <a href="{{ route('admin.company_employee.create') }}" class="btn btn-primary btn-sm">Add Resource</a>
            <a href="{{ route('admin.company_employee.bulk-upload') }}" class="btn btn-success btn-sm">Bulk Upload</a>
        @else
            <a href="{{ route('admin.company.create') }}" class="btn btn-primary btn-sm">Create Company</a>
        @endif
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @include('includes.upgrade_alert')
            @if (session('success'))
                <div class="callout callout-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('warning'))
                <div class="callout callout-warning">
                    {{ session('warning') }}
                </div>
            @endif

            @if (session('error'))
                <div class="callout callout-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('info'))
                <div class="callout callout-info">
                    {{ session('info') }}
                </div>
            @endif

            @if(!$company)
                <div class="box box-warning">
                    <div class="box-body text-center" style="padding: 40px;">
                        <i class="fa fa-building-o" style="font-size: 64px; color: #f39c12; margin-bottom: 20px;"></i>
                        <h3>No Company Found</h3>
                        <p>You need to create a company first before you can manage employees.</p>
                        <a href="{{ route('admin.company.create') }}" class="btn btn-primary btn-lg" style="margin-top: 20px;">
                            <i class="fa fa-plus"></i> Create Company
                        </a>
                    </div>
                </div>
            @else
                <div class="box box-info">
                    <div class="box-body">
                        <form method="GET" action="{{ route('admin.company_employee.index') }}">
                            <div class="row" style="margin-bottom:10px">
                                <div class="d-flex col-sm-6">
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by name, email, or phone" value="{{ request('search') }}">
                                </div>
                                <div class="d-flex col-sm-3">
                                    <select name="type" id="type" class="form-control status" style="margin-bottom:5px" onchange="this.form.submit()">
                                        <option value="All" {{ request('type') == 'All' ? 'selected' : '' }}>All Types</option>
                                        <option value="employee" {{ request('type') == 'employee' ? 'selected' : '' }}>Employee</option>
                                        <option value="client" {{ request('type') == 'client' ? 'selected' : '' }}>Client</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                        </form>
                        <div class="table-responsive">
                        <table id="" class="table table-bordered table-striped">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @forelse($employees as $key=>$employee)
                                <tr id="id-{{ $employee->id }}">
                                    <td>{{ $employees->firstItem()+$key }}.</td>
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
                                    <td>{{ $employee->delivery_status ?? '—' }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($employee->notes ?? '', 30) }}</td>
                                    <td>
                                        <a href="{{ route('admin.company_employee.edit', $employee->id) }}" class="btn btn-primary btn-xs">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <button class="btn btn-danger btn-xs delete" data-id="{{ $employee->id }}" data-del-url="{{ route('admin.company_employee.destroy', $employee->id) }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="30" class="text-center">No employees found.</td>
                                </tr>
                            @endforelse
                            @if($employees->count() > 0)
                                <tr>
                                    <td colspan="30">
                                        Displaying {{$employees->firstItem()}} to {{$employees->lastItem()}} of {{$employees->total()}} records
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
            @endif
        </div>
</section>
@endsection

@push('js')
<script>
$(document).ready(function() {
    // Submit form on Enter key press in search field
    $('#search').on('keypress', function(e) {
        if (e.which === 13) { // Enter key
            e.preventDefault();
            $(this).closest('form').submit();
        }
    });

    // Delete functionality
    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        var url = $(this).data('del-url');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(response) {
                        $('#id-' + id).remove();
                        Swal.fire(
                            'Deleted!',
                            'Employee has been deleted successfully.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'Something went wrong while deleting the employee.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>
@endpush
