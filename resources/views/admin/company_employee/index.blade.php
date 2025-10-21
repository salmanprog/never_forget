@extends('layouts.company.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('company.employees.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>Company Employees</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('company.employees.create') }}" class="btn btn-primary btn-sm">Add Employee</a>
        <a href="{{ route('company.employees.bulk-upload') }}" class="btn btn-success btn-sm">Bulk Upload</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
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

            <div class="box box-info">
                <div class="box-body">
                    <div class="row" style="margin-bottom:10px">
                        <div class="d-flex col-sm-4">
                            <input type="text" id="search" class="form-control" placeholder="Search by name or email">
                        </div>
                        <div class="d-flex col-sm-3">
                            <select name="" id="type" class="form-control type" style="margin-bottom:5px">
                                <option value="All" selected>All Types</option>
                                <option value="employee">Employee</option>
                                <option value="client">Client</option>
                            </select>
                        </div>
                        <div class="d-flex col-sm-3">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>All Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="d-flex col-sm-2">
                            <button type="button" id="search-btn" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Invited At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($employees as $key=>$employee)
                                <tr id="id-{{ $employee->id }}">
                                    <td>{{ $employees->firstItem()+$key }}.</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge {{ $employee->type == 'employee' ? 'label-primary' : 'label-info' }}">
                                            {{ ucfirst($employee->type) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($employee->is_active)
                                            <span class="badge label-success">Active</span>
                                        @else
                                            <span class="badge label-danger">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $employee->invited_at ? $employee->invited_at->format('M d, Y') : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('company.employees.edit', $employee->id) }}" class="btn btn-primary btn-xs">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        @if(!$employee->is_active)
                                            <a href="{{ route('company.employees.resend-invitation', $employee->id) }}" class="btn btn-warning btn-xs">
                                                <i class="fa fa-envelope"></i> Resend
                                            </a>
                                        @endif
                                        <button class="btn btn-danger btn-xs delete" data-id="{{ $employee->id }}" data-del-url="{{ route('company.employees.destroy', $employee->id) }}">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="9">
                                    Displaying {{$employees->firstItem()}} to {{$employees->lastItem()}} of {{$employees->total()}} records
                                    <div class="d-flex justify-content-center">
                                        {!! $employees->links('pagination::bootstrap-4') !!}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
@endsection

@push('js')
<script>
$(document).ready(function() {
    // Search functionality
    $('#search-btn').click(function() {
        var search = $('#search').val();
        var type = $('#type').val();
        var status = $('#status').val();
        
        $.ajax({
            url: $('#page_url').val(),
            type: 'GET',
            data: {
                search: search,
                type: type,
                status: status,
                ajax: true
            },
            success: function(response) {
                $('#body').html($(response).find('#body').html());
            }
        });
    });

    // Delete functionality
    $(document).on('click', '.delete', function() {
        if (confirm('Are you sure you want to delete this employee?')) {
            var id = $(this).data('id');
            var url = $(this).data('del-url');
            
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#id-' + id).remove();
                    alert('Employee deleted successfully!');
                },
                error: function() {
                    alert('Error deleting employee!');
                }
            });
        }
    });
});
</script>
@endpush
