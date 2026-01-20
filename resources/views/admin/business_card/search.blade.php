@foreach ($models as $key => $model)
<tr id="id-{{ $model->id }}">
    <td>{{ $models->firstItem() + $key }}.</td>

    <td width="80px">{{ $model->order_number }}</td>

    <td>
        @foreach ($model->hasOrderDetails as $orderDetail)
            {{ $orderDetail->productsItem->name ?? $orderDetail->product_slug ?? 'No Product' }}
            <br>
        @endforeach
    </td>

    <td>
        @foreach ($model->hasOrderDetails as $orderDetail)
            {{ $orderDetail->quantity }}<br>
        @endforeach
    </td>

    <td>
        @foreach ($model->hasOrderDetails as $orderDetail)
            ${{ number_format($orderDetail->price, 2) }}<br>
        @endforeach
    </td>

    <td>{{ $model->created_at->format('d, m-Y H:i A') }}</td>

    <td>
        <span class="badge label-info">{{ $model->order_status }}</span>
    </td>

    @if (Auth::user()->hasRole('Admin'))
    <td>
        <a href="{{ route('order.show', $model->id) }}" class="btn btn-info btn-xs">
            <i class="fa fa-eye"></i>
        </a>
    </td>
    @endif
</tr>
@endforeach

<tr>
    <td colspan="8">
        Displying {{ $models->firstItem() }} to {{ $models->lastItem() }} of {{ $models->total() }} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>

<script>
    //delete record
$('.delete').on('click', function(){
    var slug = $(this).attr('data-slug');
    var delete_url = $(this).attr('data-del-url');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url : delete_url,
                type : 'DELETE',
                success : function(response){
                    if(response){
                        $('#id-'+slug).hide();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Not Deleted!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }
    })
});
</script>
