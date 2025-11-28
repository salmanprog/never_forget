@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>{{ $model->user->name ?? 'N/A' }}<br><small>{{ $model->user->email ?? '' }}</small></td>
        <td>{{\Illuminate\Support\Str::limit($model->title, 40)}}</td>
        <td>{{\Illuminate\Support\Str::limit($model->description, 50)}}</td>
        <td>{{ $model->module ?? 'N/A' }}</td>
        <td>
            @if($model->is_read)
                <span class="badge label-success">Read</span>
            @else
                <span class="badge label-warning">Unread</span>
            @endif
        </td>
        <td>
            @if($model->is_view)
                <span class="badge label-success">Viewed</span>
            @else
                <span class="badge label-danger">Not Viewed</span>
            @endif
        </td>
        <td>{{ $model->created_at->format('M d, Y H:i') }}</td>
        <td width="200px">
            <a href="{{route('notification.show', $model->id)}}" data-toggle="tooltip" data-placement="top" title="View notification" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
            @can('notification-edit')
                <a href="{{route('notification.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit notification" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('notification-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('notification', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="9">
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
                            'Your notification has been deleted.',
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

