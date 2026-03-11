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
