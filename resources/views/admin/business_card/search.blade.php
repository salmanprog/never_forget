@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>
            @if($model->image)
                <img src="{{ asset('public/admin/assets/images/styles/'.$model->image) }}" alt="" style="width:60px;">
            @else
                <img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:60px;">
            @endif
        </td>
        <td>{{\Illuminate\Support\Str::limit($model->title,60)}}</td>
        {{--<td>{!! \Illuminate\Support\Str::limit($model->image_css,60) !!}</td>--}}
        <td>{!! $model->heading ? \Illuminate\Support\Str::limit($model->heading, 60) : 'N/A' !!}</td>
        <td>{!! $model->description ? \Illuminate\Support\Str::limit($model->description, 60) : 'N/A' !!}</td>

        <td>
            <div class="image-slider">
                @if (!empty($model->description_images))
                    @foreach (json_decode($model->description_images) as $image)
                        <img class="slider-image" src="{{ asset('public/admin/assets/images/styles/description-image/' . $image) }}" alt="">
                    @endforeach
                @else
                    <img style="width: 80px" id="banner_previewww" src="{{ asset('public/admin/assets/images/default.jpg') }}" alt="Image Not Found">
                @endif
            </div>
        </td>
        <td>
            @if($model->back_image)
                <img src="{{ asset('public/admin/assets/images/styles/back-image/'.$model->back_image) }}" alt="" style="width:60px;">
            @else
                <img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:60px;">
            @endif
        </td>
        <td>
            @if($model->frame_image)
                <img src="{{ asset('public/admin/assets/images/styles/frame-image/'.$model->frame_image) }}" alt="" style="width:60px;">
            @else
                <img src="{{ asset('public/admin/assets/images/default.jpg') }}" style="width:60px;">
            @endif
        </td>
        <td>
            @if($model->sub_style)
                <span class="label label-info">{{isset($model->hasSubStyle)?$model->hasSubStyle->title:'N/A'}}</span>
            @else
                <span class="badge badge-danger">No Sub Style</span>
            @endif
        </td>
        <td>
            @if($model->status)
                <span class="badge label-success">Active</span>
            @else
                <span class="badge label-danger">In-Active</span>
            @endif
        </td>
        <td>{{isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'}}</td>
        <td width="250px">
            @can('styles-edit')
                <a href="{{route('styles.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Style" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('styles-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('styles', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="12">
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
