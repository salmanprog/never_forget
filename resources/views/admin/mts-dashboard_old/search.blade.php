@foreach($users as $key=>$user)
    @if($user->hasRole('Admin'))
        @continue;
    @endif
    <tr id="id-{{ $user->id }}">
        <td>{{ $users->firstItem()+$key }}.</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->last_name ?? 'N/A' }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone ?? 'N/A' }}</td>
        <td>{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('M d, Y') : 'N/A' }}</td>
         <td>
             @if($user->account_type == 'Company')
                 <span class="badge badge-company">
                     Company
                 </span>
             @else
                 <span class="badge badge-individual">
                     Individual
                 </span>
             @endif
         </td>
        <td>{{ $user->company_name ?? 'N/A' }}</td>
        <td>
            @if($user->status)
                <span class="badge label-success">Active</span>
            @else
                <span class="badge label-danger">In-Active</span>
            @endif
        </td>
        <td>
            <div class="btn-group" role="group">
                @if($user->phone)
                    <button type="button" class="btn btn-success btn-xs" onclick="sendText('{{ $user->phone }}', '{{ $user->name }}')" title="Send Text">
                        <i class="fa fa-comment"></i>
                    </button>
                @endif
                @if($user->phone)
                    <button type="button" class="btn btn-primary btn-xs" onclick="makeCall('{{ $user->phone }}', '{{ $user->name }}')" title="Make Call">
                        <i class="fa fa-phone"></i>
                    </button>
                @endif
                <button type="button" class="btn btn-info btn-xs" onclick="sendEmail('{{ $user->email }}', '{{ $user->name }}')" title="Send Email">
                    <i class="fa fa-envelope"></i>
                </button>
            </div>
        </td>
    </tr>
@endforeach
<tr>
     <td colspan="10">
        Displaying {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} records
        <div class="d-flex justify-content-center">
            {!! $users->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
