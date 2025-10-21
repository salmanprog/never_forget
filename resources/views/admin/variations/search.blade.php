@foreach($variations as $key=>$variation)
	<tr id="id-{{ $variation->id }}">
		<td>{{ $variations->firstItem()+$key }}.</td>
		<td>{!! $variation->name !!}</td>
		<td>
			@if($variation->status)
				<span class="badge label-success">Active</span>
			@else
				<span class="badge label-danger">In-Active</span>
			@endif
		</td>
		<td>
			@can('variations-edit')
				<a href="{{route('variations.edit', $variation->id)}}" data-toggle="tooltip" data-placement="top" title="Edit variation" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
			@endcan
			@can('variations-delete')
				<button class="btn btn-danger btn-xs delete" data-slug="{{ $variation->id }}" data-del-url="{{ url('variations', $variation->id) }}"><i class="fa fa-trash"></i> Delete</button>
			@endcan
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="6">
		Displying {{$variations->firstItem()}} to {{$variations->lastItem()}} of {{$variations->total()}} records
		<div class="d-flex justify-content-center">
			{!! $variations->links('pagination::bootstrap-4') !!}
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
