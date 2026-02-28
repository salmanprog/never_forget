@foreach($enquiries as $enquiry)
<tr class="enquiry-summary-row">
    <td>{{ $enquiry->name ?? '—' }}</td>
    <td>{{ $enquiry->email ?? '—' }}</td>
    <td>{{ $enquiry->created_at ? $enquiry->created_at->format('d M Y') : '—' }}</td>
    <td>
        <button type="button" class="btn btn-xs btn-default btn-toggle-enquiry-detail" data-target="journey-expert-detail-{{ $enquiry->id }}" aria-expanded="false">
            <i class="fa fa-chevron-down"></i> View details
        </button>
    </td>
</tr>
<tr class="enquiry-detail-row" id="journey-expert-detail-{{ $enquiry->id }}" style="display: none;">
    <td colspan="4" class="bg-light">
        <div class="p-3">
            <strong>Enquiry details</strong>
            <table class="table table-bordered table-condensed mt-2 mb-0">
                <tbody>
                    @if(!empty($enquiry->name))
                        <tr><th width="180">Name</th><td>{{ $enquiry->name }}</td></tr>
                    @endif
                    @if(!empty($enquiry->email))
                        <tr><th width="180">Email</th><td>{{ $enquiry->email }}</td></tr>
                    @endif
                    @if(!empty($enquiry->phone))
                        <tr><th width="180">Phone</th><td>{{ $enquiry->phone }}</td></tr>
                    @endif
                    @if(!empty($enquiry->message))
                        <tr><th width="180">Message</th><td>{{ $enquiry->message }}</td></tr>
                    @endif
                    @if($enquiry->created_at)
                        <tr><th width="180">Date</th><td>{{ $enquiry->created_at->format('d M Y H:i') }}</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="4">
        Displaying {{ $enquiries->firstItem() }} to {{ $enquiries->lastItem() }} of {{ $enquiries->total() }} records
        <div class="d-flex justify-content-center">
            {!! $enquiries->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
