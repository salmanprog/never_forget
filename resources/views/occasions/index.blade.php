@if (Auth::user()->isIndividual())
    @extends('layouts.individual.app')
@elseif (Auth::user()->isCompany())
    @extends('layouts.company.app')
@endif

@section('title', 'Occasions')
@section('content')
<section class="content-header">
    <h1 style="color:#c98900 !important; font-weight: 700;">
        @if(Auth::user()->isIndividual())
            Personal Occasions
        @else
            Professional Occasions
        @endif
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">All Occasions</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('occasions.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Add New Occasion
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    @if($occasions->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Notes</th>
                                        <th>Recurring</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($occasions as $occasion)
                                        <tr>
                                            <td>{{ $occasion->title }}</td>
                                            <td>{{ $occasion->occasion_date->format('M d, Y') }}</td>
                                            <td>{{ $occasion->notes ?? 'N/A' }}</td>
                                            <td>
                                                @if($occasion->is_recurring)
                                                    <span class="label label-success">Yes</span>
                                                @else
                                                    <span class="label label-default">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('occasions.show', $occasion->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                <a href="{{ route('occasions.edit', $occasion->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('occasions.destroy', $occasion->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this occasion?')">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center">
                            <div class="alert alert-info">
                                <h4>No occasions found</h4>
                                <p>You haven't added any occasions yet. Start by adding your first occasion!</p>
                                <a href="{{ route('occasions.create') }}" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add Your First Occasion
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
