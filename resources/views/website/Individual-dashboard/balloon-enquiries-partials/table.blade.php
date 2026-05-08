@foreach($balloonEnquiries as $enquiry)
<tr class="enquiry-summary-row">
    <td>{{ $enquiry->user_name }}</td>
    <td>{{ $enquiry->email }}</td>
    <td>{{ $enquiry->phone ?: '—' }}</td>
    <td>{{ $enquiry->created_at->format('d M Y') }}</td>
    <td>
        <button type="button" class="btn btn-xs btn-default btn-toggle-enquiry-detail" data-target="balloon-detail-{{ $enquiry->id }}" aria-expanded="false">
            <i class="fa fa-chevron-down"></i> View details
        </button>
    </td>
</tr>
<tr class="enquiry-detail-row" id="balloon-detail-{{ $enquiry->id }}" style="display: none;">
    <td colspan="5" class="bg-light">
        <div class="p-3">
            @if($enquiry->message)
                <div class="mb-3">
                    <strong>Message:</strong>
                    <p class="mb-0 mt-1">{{ $enquiry->message }}</p>
                </div>
            @endif
            @if($enquiry->items && $enquiry->items->count() > 0)
                <strong>Selected items</strong>
                <table class="table table-bordered table-condensed mt-2 mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquiry->items as $item)
                        <tr>
                            <td>{{ $item->balloon ? $item->balloon->title : '—' }}</td>
                            <td>
                                @if($item->balloon && $item->balloon->images)
                                    <img src="{{ asset('public/' . $item->balloon->images) }}" alt="{{ $item->balloon->title ?? 'Item' }}" style="max-width: 80px; max-height: 80px;">
                                @else
                                    —
                                @endif
                            </td>
                            <td>{{ $item->quantity ?? 0 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="mb-0 text-muted">No items.</p>
            @endif
        </div>
    </td>
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
