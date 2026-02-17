@foreach($enquiries as $key => $enquiry)
<tr>
    <td>{{ $enquiries->firstItem() + $key }}</td>
    <td>{{ $enquiry->sender_name ?? 'N/A' }}<br><small>{{ $enquiry->sender_email ?? '' }}</small></td>
    <td>{{ $enquiry->recipient_name }}<br><small>{{ $enquiry->recipient_email_phone }}</small></td>
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
</tr>
@endforeach
<tr>
    <td colspan="7">
        Displaying {{ $enquiries->firstItem() }} to {{ $enquiries->lastItem() }} of {{ $enquiries->total() }} records
        <div class="d-flex justify-content-center">
            {!! $enquiries->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
