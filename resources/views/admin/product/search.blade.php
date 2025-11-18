@foreach($models as $key=>$model)
    <tr id="id-{{ $model->slug }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>
            @if($model->image)
                <img src="{{ asset('public/admin/assets/images/product/'.$model->image) }}" alt="" style="width:80px;">
            @else
                <img src="{{ asset('public/admin/assets/images/product/no-photo1.jpg') }}" style="width:80px;">
            @endif
        </td>
        <td>{!! \Illuminate\Support\Str::limit($model->name,40) !!}</td>
        <td>{{ $model->hasCategory ? $model->hasCategory->title : 'N/A' }}</td> 
        <td>
            @if($model->product_type == 1)
                <span class="label label-yellow">Variable Product</span>
            @else
                <span class="label label-blue">Simple Product</span>
            @endif
        </td>
        <td>
            @if($model->product_type == 0)
                ${{ number_format($model->product_price, 2) }}
            @else
                @php
                    $priceRange = json_decode($model->variation_price);
                    if ($priceRange && isset($priceRange->from) && isset($priceRange->to)) {
                        echo '$' . number_format($priceRange->from, 2) . ' – $' . number_format($priceRange->to, 2);
                    } else {
                        echo 'N/A';
                    }
                @endphp
            @endif
        </td> 
        <td>
            @if($model->status)
                <span class="badge label-success">Active</span>
            @else
                <span class="badge label-danger">In-Active</span>
            @endif
        </td>
        <td> 
            <a href="{{route('product.show', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Show product" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
            @can('product-edit')
                <a href="{{route('product.edit', $model->slug)}}" data-toggle="tooltip" data-placement="top" title="Edit product" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a>
            @endcan
            @can('product-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->slug }}" data-del-url="{{ url('product', $model->slug) }}" data-toggle="tooltip" data-placement="top" title="Delete product"><i class="fa fa-trash"></i></button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="9">
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
