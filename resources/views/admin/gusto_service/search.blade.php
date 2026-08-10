@if($models->count() === 0)
    <tr>
        <td colspan="7" class="text-center">No services found.</td>
    </tr>
@else
    @foreach($models as $key => $model)
        <tr id="id-{{ $model->id }}">
            <td>{{ $models->firstItem() + $key }}.</td>
            <td>{{ $model->title }}</td>
            <td><code>{{ $model->slug }}</code></td>
            <td>{{ $model->options_count ?? $model->options()->count() }}</td>
            <td>{{ $model->sort_order }}</td>
            <td>
                @if($model->status)
                    <span class="badge label-success">Active</span>
                @else
                    <span class="badge label-danger">In-Active</span>
                @endif
            </td>
            <td>
                <a href="{{ route('gusto_service.edit', $model->id) }}" class="btn btn-info btn-xs">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <button class="btn btn-danger btn-xs delete"
                    data-slug="{{ $model->id }}"
                    data-del-url="{{ url('gusto_service', $model->id) }}">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="7">
            Displaying {{ $models->firstItem() }} to {{ $models->lastItem() }} of {{ $models->total() }} records
            <div class="d-flex justify-content-center">
                {!! $models->links('pagination::bootstrap-4') !!}
            </div>
        </td>
    </tr>
@endif
