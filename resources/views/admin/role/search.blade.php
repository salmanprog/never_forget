@foreach($roles as $key=>$role)
<tr id="id-{{ $role->id }}">
    <td>{{  $roles->firstItem()+$key }}.</td>
    <td>{{ $role->name }}</td>
    <td>{!! $role->description??'N/A' !!}</td>
    <td>
        @can('role-edit')
            <a class="btn btn-primary btn-xs" href="{{ route('role.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>
        @endcan
       {{--  @can('role-delete')
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $role->id }}" data-del-url="{{ url('role', $role->id) }}"><i class="fa fa-trash"></i> Delete</button>
        @endcan --}}
    </td>
</tr>
@endforeach
<tr>
    <td colspan="4">
        <div class="d-flex justify-content-center">
            {!! $roles->links('pagination::bootstrap-4') !!}
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
