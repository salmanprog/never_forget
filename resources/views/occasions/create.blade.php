@if (Auth::user()->isIndividual())
    @extends('layouts.individual.app')
@elseif (Auth::user()->isCompany())
    @extends('layouts.company.app')
@endif

@section('title', 'Add New Occasion')
@section('content')
<section class="content-header">
    <h1 style="color:#c98900 !important; font-weight: 700;">Add New Occasion</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Occasion Details</h3>
                </div>
                <form action="{{ route('occasions.store') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Occasion Type</label>
                            <select name="title" id="title" class="form-control" required>
                                <option value="">Select Occasion Type</option>
                                @foreach($occasionTypes as $key => $value)
                                    <option value="{{ $key }}" {{ old('title') == $key ? 'selected' : '' }}>
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
                                   class="form-control" value="{{ old('occasion_date') }}" required>
                            @error('occasion_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="notes">Notes (Optional)</label>
                            <textarea name="notes" id="notes" class="form-control" rows="3" 
                                      placeholder="Add any additional notes about this occasion">{{ old('notes') }}</textarea>
                            @error('notes')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_recurring" value="1" 
                                           {{ old('is_recurring') ? 'checked' : '' }}>
                                    This is a recurring occasion (e.g., yearly birthday)
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Save Occasion
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
                    <h3 class="box-title">Tips</h3>
                </div>
                <div class="box-body">
                    @if(Auth::user()->isIndividual())
                        <p><strong>Personal Occasions:</strong></p>
                        <ul>
                            <li>Birthdays of family and friends</li>
                            <li>Wedding anniversaries</li>
                            <li>Special holidays</li>
                            <li>Personal milestones</li>
                        </ul>
                    @else
                        <p><strong>Professional Occasions:</strong></p>
                        <ul>
                            <li>Employee work anniversaries</li>
                            <li>Career milestones</li>
                            <li>Professional achievements</li>
                            <li>Client appreciation events</li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
