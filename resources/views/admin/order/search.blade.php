@foreach($models as $key=>$model)
    <tr id="id-{{ $model->slug }}">
        <td>{{ $models->firstItem()+$key }}.</td>

        <td width="80px">{{ $model->order_number }}</td>

        <td>
            @if($model->customer_id > 0 && $model->hasCustomer)
                {{ $model->hasCustomer->name }}
            @else
                {{ $model->guest_first_name }} {{ $model->guest_last_name }} (Guest)
            @endif
        </td>
        <td>
            @if($model->customer_id > 0 && $model->hasCustomer)
                {{ $model->hasCustomer->email }}
            @else
                {{ $model->guest_email }}
            @endif
        </td>
        <td>{{ date('d, m-Y H:i A', strtotime($model->created_at)) }}</td>
        <td>
            @if($model->order_status == 'Pending')
                <span class="badge label-info">Pending</span>
            @elseif($model->order_status == 'Delivered')
                <span class="badge label-warning">Delivered</span>
            @elseif($model->order_status == 'Completed')
                <span class="badge label-success">Completed</span>
            @elseif($model->order_status == 'Canceled')
                <span class="badge label-danger">Canceled</span>
            @endif
        </td>
        
        <td width="100px">
            @can('order-show')
                <a href="{{route('order.show', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Show order" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
            @endcan
            @can('order-edit')
                <a href="{{route('order.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit order" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
            @endcan
            @can('order-invoice')
                <a href="{{ route('order.invoice', ['id' => $model->id]) }}" data-toggle="tooltip" data-placement="top" title="Order Invoice" class="btn btn-warning btn-xs"><i class="fa fa-file"></i></a>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="7">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
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
