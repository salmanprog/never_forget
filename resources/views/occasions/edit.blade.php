@if (Auth::user()->isIndividual())
    @extends('layouts.individual.app')
@elseif (Auth::user()->isCompany())
    @extends('layouts.company.app')
@endif

@section('title', 'Edit Occasion')
@section('content')
<section class="content-header">
    <h1 style="color:#c98900 !important; font-weight: 700;">Edit Occasion</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Occasion Details</h3>
                </div>
                <form action="{{ route('occasions.update', $occasion->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Occasion Type</label>
                            <select name="title" id="title" class="form-control" required>
                                <option value="">Select Occasion Type</option>
                                @foreach($occasionTypes as $key => $value)
                                    <option value="{{ $key }}" 
                                            {{ old('title', $occasion->title) == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="occasion_date">Date</label>
                            <input type="date" name="occasion_date" id="occasion_date" 
                                   class="form-control" 
                                   value="{{ old('occasion_date', $occasion->occasion_date->format('Y-m-d')) }}" required>
                            @error('occasion_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="notes">Notes (Optional)</label>
                            <textarea name="notes" id="notes" class="form-control" rows="3" 
                                      placeholder="Add any additional notes about this occasion">{{ old('notes', $occasion->notes) }}</textarea>
                            @error('notes')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_recurring" value="1" 
                                           {{ old('is_recurring', $occasion->is_recurring) ? 'checked' : '' }}>
                                    This is a recurring occasion (e.g., yearly birthday)
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Update Occasion
                        </button>
                        <a href="{{ route('occasions.index') }}" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i> Back to Occasions
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Occasion Info</h3>
                </div>
                <div class="box-body">
                    <p><strong>Created:</strong> {{ $occasion->created_at->format('M d, Y') }}</p>
                    <p><strong>Last Updated:</strong> {{ $occasion->updated_at->format('M d, Y') }}</p>
                    <p><strong>Type:</strong> {{ ucfirst($occasion->type) }}</p>
                    <p><strong>Recurring:</strong> 
                        @if($occasion->is_recurring)
                            <span class="label label-success">Yes</span>
                        @else
                            <span class="label label-default">No</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
