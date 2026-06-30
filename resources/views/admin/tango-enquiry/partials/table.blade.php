@foreach($enquiries as $key => $enquiry)
<tr>
    <td>{{ $enquiries->firstItem() + $key }}</td>
    <td>{{ $enquiry->sender_name ?? 'N/A' }}<br><small>{{ $enquiry->sender_email ?? '' }}</small></td>
    <td>{{ $enquiry->recipient_name }}<br><small>{{ $enquiry->recipient_email_phone }}</small></td>
    <td>{{ optional($enquiry->tangoCategory)->title ?? '—' }}</td>
    <td>{{ $enquiry->occasion }}</td>
    <td>{{ \Carbon\Carbon::parse($enquiry->send_date)->format('d M Y') }} {{ \Carbon\Carbon::parse($enquiry->send_time)->format('h:i A') }}</td>
    <td>
        <select class="form-control tango-status-select" data-id="{{ $enquiry->id }}" style="min-width: 180px;">
            @foreach(['New Request', 'Waiting for Design', 'Awaiting Client Approval', 'Ready to Send', 'Completed'] as $status)
                <option value="{{ $status }}" {{ $enquiry->status == $status ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
    </td>
    <td><a href="{{ route('tango_enquiry.show', $enquiry->id) }}" class="btn btn-info btn-sm">View</a></td>
    <td>
        <div class="btn-group mts-contacts-btn-group" role="group">
            @if ($enquiry->sender_phone)
                <button type="button" class="btn btn-success btn-xs btn-open-message-modal" data-name="{{ $enquiry->sender_name ?? '' }}" data-phone="{{ $enquiry->sender_phone }}"><i class="fa fa-comment"></i></button>
                <button type="button" class="btn btn-primary btn-xs btn-initiate-call" data-phone="{{ $enquiry->sender_phone }}" data-name="{{ $enquiry->sender_name ?? '' }}"><i class="fa fa-phone"></i></button>
            @endif
            <button type="button" class="btn btn-info btn-xs btn-open-email-modal" data-email="{{ $enquiry->sender_email ?? '' }}" data-name="{{ $enquiry->sender_name ?? '' }}"><i class="fa fa-envelope"></i></button>
        </div>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="9">
        Displaying {{ $enquiries->firstItem() }} to {{ $enquiries->lastItem() }} of {{ $enquiries->total() }} records
        <div class="d-flex justify-content-center">{!! $enquiries->links('pagination::bootstrap-4') !!}</div>
    </td>
</tr>
