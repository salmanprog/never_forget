@if (Auth::user()->isIndividual())
    @extends('layouts.individual.app')
@elseif (Auth::user()->isCompany())
    @extends('layouts.company.app')
@endif

@section('title', 'View Occasion')
@section('content')
<section class="content-header">
    <h1 style="color:#c98900 !important; font-weight: 700;">View Occasion</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $occasion->title }}</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('occasions.edit', $occasion->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('occasions.index') }}" class="btn btn-default btn-sm">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Occasion Type:</strong> {{ $occasion->title }}</p>
                            <p><strong>Date:</strong> {{ $occasion->occasion_date->format('F d, Y') }}</p>
                            <p><strong>Day of Week:</strong> {{ $occasion->occasion_date->format('l') }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Type:</strong> 
                                <span class="label label-{{ $occasion->type == 'personal' ? 'primary' : 'success' }}">
                                    {{ ucfirst($occasion->type) }}
                                </span>
                            </p>
                            <p><strong>Recurring:</strong> 
                                @if($occasion->is_recurring)
                                    <span class="label label-success">Yes</span>
                                @else
                                    <span class="label label-default">No</span>
                                @endif
                            </p>
                            <p><strong>Created:</strong> {{ $occasion->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    
                    @if($occasion->notes)
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Notes</h4>
                                <div class="well">
                                    {{ $occasion->notes }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="box-footer">
                    <a href="{{ route('occasions.edit', $occasion->id) }}" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Edit Occasion
                    </a>
                    <form action="{{ route('occasions.destroy', $occasion->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this occasion?')">
                            <i class="fa fa-trash"></i> Delete Occasion
                        </button>
                    </form>
                    <a href="{{ route('occasions.index') }}" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Back to Occasions
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Actions</h3>
                </div>
                <div class="box-body">
                    <a href="{{ route('occasions.create') }}" class="btn btn-primary btn-block">
                        <i class="fa fa-plus"></i> Add New Occasion
                    </a>
                    <a href="{{ route('occasions.edit', $occasion->id) }}" class="btn btn-warning btn-block">
                        <i class="fa fa-edit"></i> Edit This Occasion
                    </a>
                    <a href="{{ route('occasions.index') }}" class="btn btn-info btn-block">
                        <i class="fa fa-list"></i> View All Occasions
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
