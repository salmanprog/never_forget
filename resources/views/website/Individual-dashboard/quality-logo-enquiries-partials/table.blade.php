@foreach($enquiries as $enquiry)
<tr>
    <td>{{ $enquiry->product_name ?? '—' }}</td>
    <td>{{ $enquiry->name }}</td>
    <td>{{ $enquiry->email }}</td>
    <td>{{ $enquiry->phone ?: 'No Phone' }}</td>
    <td>{{ $enquiry->message ?: 'No message' }}</td>
    <td>{{ $enquiry->created_at->format('d M Y') }}</td>
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
