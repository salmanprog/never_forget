@foreach ($enquiries as $key => $enquiry)
<tr>
    <td>{{ $enquiries->firstItem() + $key }}.</td>
    <td>{{ $enquiry->recipient_name }}<br><small>{{ $enquiry->recipient_email_phone }}</small></td>
    <td>{{ optional($enquiry->eCardCategory)->title ?? '—' }}</td>
    <td>{{ $enquiry->occasion }}</td>
    <td>{{ \Carbon\Carbon::parse($enquiry->send_date)->format('d M Y') }} {{ \Carbon\Carbon::parse($enquiry->send_time)->format('h:i A') }}</td>
    <td>
        @if($enquiry->status == 'New Request')
            <span class="badge label-info">New Request</span>
        @elseif($enquiry->status == 'Waiting for Design')
            <span class="badge label-warning">Waiting for Design</span>
        @elseif($enquiry->status == 'Awaiting Client Approval')
            <span class="badge label-primary">Awaiting Client Approval</span>
        @elseif($enquiry->status == 'Ready to Send')
            <span class="badge label-success">Ready to Send</span>
        @elseif($enquiry->status == 'Completed')
            <span class="badge label-success">Completed</span>
        @else
            <span class="badge label-default">{{ $enquiry->status }}</span>
        @endif
    </td>
</tr>
@endforeach
<tr>
    <td colspan="6">
        Displaying {{ $enquiries->firstItem() }} to {{ $enquiries->lastItem() }} of {{ $enquiries->total() }} records
        <div class="d-flex justify-content-center">
            {!! $enquiries->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
