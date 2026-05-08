@foreach($perfectGiftEnquiries as $enquiry)
    <tr>
        <td>{{ $enquiry->user_name }}</td>
        <td>{{ $enquiry->email }}</td>
        <td>
            @if (!$enquiry->phone)
              No Phone
            @endif
            {{ $enquiry->phone }}
        </td>
        <td>
            @if (!$enquiry->message)
                <span>No message</span>
            @endif
            {{ $enquiry->message }}
        </td>
        <td>{{ $enquiry->created_at->format('d M Y') }}</td>
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('perfect_gift_enquiry.show', $enquiry->id) }}">view</a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="5">
        Displaying {{ $perfectGiftEnquiries->firstItem() }}
        to {{ $perfectGiftEnquiries->lastItem() }}
        of {{ $perfectGiftEnquiries->total() }} records

        <div class="d-flex justify-content-center">
            {!! $perfectGiftEnquiries->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
