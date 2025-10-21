@foreach($news_letters as $key=>$news_letter)
    <tr id="id-{{ $news_letter->id }}">
        <td>{{ $news_letters->firstItem()+$key }}.</td>
        <!-- <td>{{$news_letter->name}}</td> -->
        <td>{{$news_letter->email}}</td>
        <td>
            @if($news_letter->status)
                <span class="badge label-success">Active</span>
            @else
                <span class="badge label-danger">In-Active</span>
            @endif
        </td>
        <td>
            @can('newsletter-edit')
                <a href="{{route('newsletter.edit', $news_letter->id)}}" data-toggle="tooltip" data-placement="top" title="Edit NewsLetter" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('newsletter-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $news_letter->id }}" data-del-url="{{ url('newsletter', $news_letter->id) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
		Displying {{$news_letters->firstItem()}} to {{$news_letters->lastItem()}} of {{$news_letters->total()}} records
        <div class="d-flex justify-content-center">
            {!! $news_letters->links('pagination::bootstrap-4') !!}
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
