@foreach ($models as $key => $model)
<tr>
    <td>{{ $models->firstItem() + $key }}.</td>
    <td width="80px">{{ $model->order_number }}</td>
    <td>
        @foreach ($model->hasOrderDetails as $orderDetail)
            @if ($orderDetail->productsItem)
                {{ $orderDetail->productsItem->name }}
            @elseif($orderDetail->product_slug)
                {{ $orderDetail->product_slug }}
            @else
                <span class="badge badge-danger">No Product</span>
            @endif
            <br>
        @endforeach
    </td>
    <td>
        @foreach ($model->hasOrderDetails as $orderDetail)
            ${{ number_format($orderDetail->price, 2) }}<br>
        @endforeach
    </td>
    <td>{{ $model->created_at->format('d, m-Y H:i A') }}</td>
</tr>
@endforeach
<tr>
    <td colspan="5">
        Displaying {{ $models->firstItem() }} to {{ $models->lastItem() }} of {{ $models->total() }} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
