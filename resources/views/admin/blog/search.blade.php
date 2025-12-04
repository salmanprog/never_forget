@foreach($models as $key=>$model)
	<tr id="id-{{ $model->id }}">
		<td>{{ $models->firstItem()+$key }}.</td>
		<td>
		@if($model->image)
			<img src="{{ asset('public/admin/assets/posts/'.$model->image) }}" alt="" style="width:60px; height:60px; object-fit:cover;">
		@else
			<img src="{{ asset('public/admin/assets/img/no-photo1.jpg') }}" style="width:60px;">
		@endif
		</td>
		<td>{!! \Illuminate\Support\Str::limit($model->title,40) !!}</td>
		<td>{!! \Illuminate\Support\Str::limit(strip_tags($model->description),60) !!}</td>
		<td>
			@if($model->status)
				<span class="badge badge-success">Active</span>
			@else
				<span class="badge badge-danger">In-Active</span>
			@endif
		</td>
		<td>{{ date('d, F-Y H:i:s A', strtotime($model->created_at)) }}</td>
		<td width="250px">
			@can('blog-edit')
				<a href="{{route('blog.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit blog" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
			@endcan
			@can('blog-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('blog', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
			@endcan
		</td>
	</tr>
@endforeach
<tr>
	<td colspan="7">
		Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
		<div class="d-flex justify-content-center">
			{!! $models->links('pagination::bootstrap-4') !!}
		</div>
	</td>
</tr>
