@foreach($users as $key=>$user)
@if($user->hasRole('Admin'))
    @continue;
@endif
<tr id="id-{{ $user->id }}">
    <td>{{  $users->firstItem()+$key }}.</td>
    <td>{{$user->name}}</td>
    <td>{{$user->last_name??'N/A'}}</td>
    <td>{{$user->email}}</td>
    <td>
        @if($user->account_type == 'Company')
            <span class="badge badge-company">
                Company
            </span>
        @else
            <span class="badge badge-individual">
                Individual
            </span>
        @endif
    </td>
    <td>
        @if($user->status)
            <span class="badge label-success">Active</span>
        @else
            <span class="badge label-danger">In-Active</span>
        @endif
    </td>
    <td>
        @can('user-edit')
            <a href="{{ route('user.edit', $user->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
        @endcan
        {{-- @can('user-delete')
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $user->id }}" data-del-url="{{ url('user', $user->id) }}"><i class="fa fa-trash"></i> Delete</button>
        @endcan --}}
    </td>
</tr>
@endforeach
<tr>
<td colspan="8">
    Displying {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} records
    <div class="d-flex justify-content-center">
        {!! $users->links('pagination::bootstrap-4') !!}
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
