@foreach ($models as $key => $model)
<tr class="enquiry-summary-row">
    <td>{{ $models->firstItem() + $key }}.</td>
    <td width="80px">{{ $model->order_number }}</td>
    <td>{{ $model->created_at->format('d M Y H:i A') }}</td>
    <td>
        <button type="button" class="btn btn-xs btn-default btn-toggle-enquiry-detail" data-target="business-card-detail-{{ $model->id }}" aria-expanded="false">
            <i class="fa fa-chevron-down"></i> View details
        </button>
    </td>
</tr>
<tr class="enquiry-detail-row" id="business-card-detail-{{ $model->id }}" style="display: none;">
    <td colspan="4" class="bg-light">
        <div class="p-3">
            @if($model->hasOrderDetails && $model->hasOrderDetails->count() > 0)
                <strong>Order line items</strong>
                <table class="table table-bordered table-condensed mt-2 mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model->hasOrderDetails as $orderDetail)
                        <tr>
                            <td>
                                @if($orderDetail->productsItem)
                                    {{ $orderDetail->productsItem->name }}
                                @elseif($orderDetail->product_slug)
                                    {{ $orderDetail->product_slug }}
                                @else
                                    —
                                @endif
                            </td>
                            <td>{{ $orderDetail->quantity ?? 0 }}</td>
                            <td>${{ number_format($orderDetail->price ?? 0, 2) }}</td>
                            <td>${{ number_format($orderDetail->sub_total ?? 0, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="mb-0 text-muted">No order details.</p>
            @endif
        </div>
    </td>
</tr>
@endforeach
<tr>
    <td colspan="4">
        Displaying {{ $models->firstItem() }} to {{ $models->lastItem() }} of {{ $models->total() }} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
