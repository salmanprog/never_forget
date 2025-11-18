@foreach($models as $key=>$model)
    <tr id="id-{{ $model->id }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>{{ $model->first_name }} {{ $model->last_name }}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->company,20) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->country,30) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->street,50) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->town,50) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->postcode,50) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->phone,50) !!}</td>
        <td>{!! \Illuminate\Support\Str::limit($model->email,50) !!}</td>
        <td>
            @if($model->status)
                <span class="label label-success">Active</span>
            @else
                <span class="label label-danger">In-Active</span>
            @endif
        </td>
        <td width="250px">
            <a href="{{route('billing_address.edit', $model->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Billing Address" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('billing_address', $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="10">
        Displying {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
