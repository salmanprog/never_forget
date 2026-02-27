@foreach($perfectGiftEnquiries as $enquiry)
<tr>
    <td>{{ $enquiry->user_name }}</td>
    <td>{{ $enquiry->email }}</td>
    <td>{{ $enquiry->phone ?: 'No Phone' }}</td>
    <td>{{ $enquiry->business_type ?: '—' }}</td>
    <td>{{ $enquiry->message ?: 'No message' }}</td>
    <td>{{ $enquiry->created_at->format('d M Y') }}</td>
</tr>
@endforeach
<tr>
    <td colspan="6">
        Displaying {{ $perfectGiftEnquiries->firstItem() }} to {{ $perfectGiftEnquiries->lastItem() }} of {{ $perfectGiftEnquiries->total() }} records
        <div class="d-flex justify-content-center">
            {!! $perfectGiftEnquiries->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
