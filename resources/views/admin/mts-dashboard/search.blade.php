@foreach ($users as $key => $user)
    @if ($user->hasRole('Admin'))
        @continue;
    @endif
    <tr id="id-{{ $user->id }}">
        <td>{{ $users->firstItem() + $key }}.</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->last_name ?? 'N/A' }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone ?? 'N/A' }}</td>
        <!-- <td>{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('M d, Y') : 'N/A' }}</td> -->
        <td>
            @if ($user->account_type == 'Company')
                <span class="badge badge-company">
                    Company
                </span>
            @elseif($user->account_type == 'Sales Person')
                <span class="badge badge-salesperson">
                    Sales Person
                </span>
            @else
                <span class="badge badge-individual">
                    Individual
                </span>
            @endif
        </td>
        @if (Auth::user()->isAdmin())
            <td>
                <select class="form-control assigned-salesperson-select" data-user-id="{{ $user->id }}"
                    style="min-width: 150px;">
                    <option value="">-- Select Salesperson --</option>
                    @foreach ($salespersons as $salesperson)
                        <option value="{{ $salesperson->id }}"
                            {{ $user->assigned_to_user_id == $salesperson->id ? 'selected' : '' }}>
                            {{ $salesperson->name }} {{ $salesperson->last_name ?? '' }} ({{ $salesperson->email }})
                        </option>
                    @endforeach
                </select>
            </td>
        @endif
        <td>
            @if ($user->status)
                <span class="badge label-success">Active</span>
            @else
                <span class="badge label-danger">In-Active</span>
            @endif
        </td>
        <td>
            <div class="btn-group" role="group">
                @if ($user->phone)
                    <button type="button" class="btn btn-success btn-xs btn-open-message-modal" title="Send Text"
                        data-name="{{ $user->name }}"
                        data-last-name="{{ $user->last_name ?? '' }}"
                        data-phone="{{ $user->phone }}">
                        <i class="fa fa-comment"></i>
                    </button>
                @endif
                @if ($user->phone)
                    <button type="button" class="btn btn-primary btn-xs btn-initiate-call" title="Make Call (Twilio)"
                        data-phone="{{ $user->phone }}"
                        data-name="{{ $user->name }} {{ $user->last_name ?? '' }}">
                        <i class="fa fa-phone"></i>
                    </button>
                @endif
                <button type="button" class="btn btn-info btn-xs btn-open-email-modal" title="Send Email"
                    data-email="{{ $user->email }}"
                    data-name="{{ $user->name }} {{ $user->last_name ?? '' }}">
                    <i class="fa fa-envelope"></i>
                </button>
            </div>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="{{ Auth::user()->isAdmin() ? '11' : '10' }}">
        Displaying {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} records
        <div class="d-flex justify-content-center">
            {!! $users->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
