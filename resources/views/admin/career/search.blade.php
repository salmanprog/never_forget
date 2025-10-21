@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>
            @if($model->image)
                <img src="{{ asset('public/admin/assets/images/careers/'.$model->image) }}" alt="" style="width:60px;">
            @else
                <img src="{{ asset('public/admin/assets/images/careers/no-photo1.jpg') }}" style="width:60px;">
            @endif
        </td>
        <td>{!! \Illuminate\Support\Str::limit($model->title,40) !!}</td>
        <td>{{ isset($model->hasCategory) ? $model->hasCategory->title : 'N/A' }}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->description,60) !!}</td>
        <td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
        <td>
            @if($model->status)
                <span class="badge label-success">Active</span>
            @else
                <span class="badge label-danger">In-Active</span>
            @endif
        </td>
        <td>
            <a href="{{route('careers.applications.view', $model->id)}}" data-toggle="tooltip" data-placement="top" title="View Applications" class="btn btn-info btn-xs"><i class="fa fa-users"></i> Applications</a>
            @can('careers-edit')
                <a href="{{route('careers.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('careers-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('careers', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="8">
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