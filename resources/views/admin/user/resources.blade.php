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
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $key => $employee)
                                <tr>
                                    <td>{{ $employees->firstItem() + $key }}.</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone ?? 'N/A' }}</td>
                                    <td>{{ $employee->date_of_birth ? \Carbon\Carbon::parse($employee->date_of_birth)->format('M d, Y') : 'N/A' }}</td>
                                    <td>
                                        <span class="badge {{ $employee->type == 'employee' ? 'label-primary' : 'label-info' }}">
                                            {{ ucfirst($employee->type) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No resources found.</td>
                                </tr>
                            @endforelse
                            @if($employees->count() > 0)
                                <tr>
                                    <td colspan="7">
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
</section>
@endsection
