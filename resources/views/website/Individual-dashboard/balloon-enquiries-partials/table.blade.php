@foreach($balloonEnquiries as $enquiry)
<tr>
    <td>{{ $enquiry->user_name }}</td>
    <td>{{ $enquiry->email }}</td>
    <td>{{ $enquiry->phone ?: 'No Phone' }}</td>
    <td>{{ $enquiry->message ?: 'No message' }}</td>
    <td>{{ $enquiry->created_at->format('d M Y') }}</td>
</tr>
@endforeach
<tr>
    <td colspan="5">
        Displaying {{ $balloonEnquiries->firstItem() }} to {{ $balloonEnquiries->lastItem() }} of {{ $balloonEnquiries->total() }} records
        <div class="d-flex justify-content-center">
            {!! $balloonEnquiries->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
