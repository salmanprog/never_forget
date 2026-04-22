@foreach($enquiries as $key => $enquiry)
<tr>
    <td>{{ $enquiries->firstItem() + $key }}</td>
    <td>{{ $enquiry->sender_name ?? 'N/A' }}<br><small>{{ $enquiry->sender_email ?? '' }}</small>@if($enquiry->sender_phone)<br><small>{{ $enquiry->sender_phone }}</small>@else<br><small class="text-muted">No Phone</small>@endif</td>
    <td>{{ $enquiry->recipient_name }}<br><small>{{ $enquiry->recipient_email_phone }}</small></td>
    <td>{{ optional($enquiry->eCardCategory)->title ?? '—' }}</td>
    <td>{{ $enquiry->occasion }}</td>
    <td>{{ \Carbon\Carbon::parse($enquiry->send_date)->format('d M Y') }} {{ \Carbon\Carbon::parse($enquiry->send_time)->format('h:i A') }}</td>
    <td>
        <select class="form-control ecard-status-select" data-id="{{ $enquiry->id }}" style="min-width: 180px;">
            <option value="New Request" {{ $enquiry->status == 'New Request' ? 'selected' : '' }}>New Request</option>
            <option value="Waiting for Design" {{ $enquiry->status == 'Waiting for Design' ? 'selected' : '' }}>Waiting for Design</option>
            <option value="Awaiting Client Approval" {{ $enquiry->status == 'Awaiting Client Approval' ? 'selected' : '' }}>Awaiting Client Approval</option>
            <option value="Ready to Send" {{ $enquiry->status == 'Ready to Send' ? 'selected' : '' }}>Ready to Send</option>
            <option value="Completed" {{ $enquiry->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </td>
    <td>
        <a href="{{ route('e_card_enquiry.show', $enquiry->id) }}" class="btn btn-info btn-sm">View</a>
    </td>
    <td>
        <div class="btn-group mts-contacts-btn-group" role="group">
            @if ($enquiry->sender_phone)
                <button type="button"
                    class="btn btn-success btn-xs btn-open-message-modal"
                    title="Send Text" data-name="{{ $enquiry->sender_name ?? '' }}"
                    data-last-name=""
                    data-phone="{{ $enquiry->sender_phone }}">
                    <i class="fa fa-comment"></i>
                </button>
            @endif
            @if ($enquiry->sender_phone)
                <button type="button"
                    class="btn btn-primary btn-xs btn-initiate-call"
                    title="Make Call (Twilio)" data-phone="{{ $enquiry->sender_phone }}"
                    data-name="{{ $enquiry->sender_name ?? '' }}">
                    <i class="fa fa-phone"></i>
                </button>
            @endif
            <button type="button" class="btn btn-info btn-xs btn-open-email-modal"
                title="Send Email" data-email="{{ $enquiry->sender_email ?? '' }}"
                data-name="{{ $enquiry->sender_name ?? '' }}">
                <i class="fa fa-envelope"></i>
            </button>
        </div>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="9">
        Displaying {{ $enquiries->firstItem() }} to {{ $enquiries->lastItem() }} of {{ $enquiries->total() }} records
        <div class="d-flex justify-content-center">
            {!! $enquiries->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
