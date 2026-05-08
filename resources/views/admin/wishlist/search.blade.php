@foreach ($wishlists as $wishlist)
<tr>
    <td>{{ $wishlist->product->name }}</td>
    <td>{{ $wishlist->created_at->format('d-m-Y') }}</td>
    <td>
        <a href="{{ route('single-product', $wishlist->product->slug) }}"
            class="btn btn-primary btn-xs" target="_blank">
            <i class="fa-regular fa-eye"></i> <span class="ms-2">View</span>
        </a>
    </td>
    <td>
        <button class="btn btn-danger btn-xs wishlist-btn"
            data-product-id="{{ $wishlist->product_id }}">
            <i class="fa fa-trash"></i> Remove
        </button>
    </td>
</tr>
@endforeach
<tr>
<td colspan="7">
Displying {{$wishlists->firstItem()}} to {{$wishlists->lastItem()}} of {{$wishlists->total()}} records
<div class="d-flex justify-content-center">
    {!! $wishlists->links('pagination::bootstrap-4') !!}
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
