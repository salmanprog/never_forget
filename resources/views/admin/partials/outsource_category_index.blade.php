<section class="content-header">
    <div class="content-header-left"><h1>{{ $page_title }}</h1></div>
    @can('product-create')
    <div class="content-header-right">
        @include('includes.buttons.back')
        <a href="{{ route($createRoute) }}" class="btn btn-primary btn-sm">{{ $page_title_add }}</a>
    </div>
    @endcan
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="callout callout-success">{{ session('message') }}</div>
            @endif
            <div class="box box-info">
                <div class="box-body">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="d-flex col-sm-8">
                            <input type="text" id="search" class="form-control" placeholder="Search by Title">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select id="status" class="form-control status">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive p-0">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th width="140">Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($models as $key => $model)
                                    <tr id="id-{{ $model->id }}">
                                        <td>{{ $models->firstItem() + $key }}.</td>
                                        <td>
                                            @if ($model->{$imageField})
                                                <img src="{{ asset('/public/' . $model->{$imageField}) }}" alt="{{ $model->title }}" style="width: 60px; height: 60px; object-fit: cover;">
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
                                                <a href="{{ route($editRoute, $model->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('product-delete')
                                                <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url($destroyPrefix, $model->id) }}"><i class="fa fa-trash"></i> Delete</button>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
