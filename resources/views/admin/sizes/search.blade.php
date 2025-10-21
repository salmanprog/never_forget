@foreach($sizes as $key=>$size)
    <tr id="id-{{ $size->id }}">
        <td>{{ $sizes->firstItem()+$key }}.</td>
        <td>{{\Illuminate\Support\Str::limit($size->sizes??'N/A',60)}}</td>
        <td>
            @if($size->status)
                <span class="badge label-success">Active</span>
            @else
                <span class="badge label-danger">In-Active</span>
            @endif
        </td>
        <td>{{isset($size->hasCreatedBy)?$size->hasCreatedBy->name:'N/A'}}</td>
        <td>
            @can('sizes-edit')
                <a href="{{route('sizes.edit', $size->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Sizes" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('sizes-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $size->id }}" data-del-url="{{ url('sizes', $size->id) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="5">
		Displying {{$sizes->firstItem()}} to {{$sizes->lastItem()}} of {{$sizes->total()}} records
        <div class="d-flex justify-content-center">
            {!! $sizes->links('pagination::bootstrap-4') !!}
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
