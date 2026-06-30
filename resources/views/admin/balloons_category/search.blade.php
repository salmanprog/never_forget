@foreach ($models as $key => $model)
    <tr id="id-{{ $model->id }}">
        <td>{{ $models->firstItem() + $key }}.</td>
        <td>
            @if ($model->images)
                <img src="{{ asset('/public/' . $model->images) }}" alt="{{ $model->title }}" style="width: 60px; height: 60px; object-fit: cover;">
            @else — @endif
        </td>
        <td>{{ \Illuminate\Support\Str::limit($model->title, 40) }}</td>
        <td>{{ $model->sort_order ?? 0 }}</td>
        <td>
            @if ($model->status ?? 1)
                <span class="label label-success">Active</span>
            @else
                <span class="label label-danger">In-Active</span>
            @endif
        </td>
        <td width="250px">
            @can('product-edit')
                <a href="{{ route('balloons_category.edit', $model->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            @endcan
            @can('product-delete')
                <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('balloons_category', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
            @endcan
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        Displaying {{ $models->firstItem() }} to {{ $models->lastItem() }} of {{ $models->total() }} records
        <div class="d-flex justify-content-center">{!! $models->links('pagination::bootstrap-4') !!}</div>
    </td>
</tr>
