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
