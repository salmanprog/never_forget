@php
    $optionsText = old('options_text');
    if ($optionsText === null && !empty($model)) {
        $optionsText = $model->options->pluck('title')->implode("\n");
    }
@endphp
<div class="box box-info">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Service Title <span style="color:red">*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="title" value="{{ old('title', $model->title ?? '') }}" required placeholder="e.g. Payroll Services">
                <span style="color: red">{{ $errors->first('title') }}</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="description" rows="3" placeholder="Optional short description">{{ old('description', $model->description ?? '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Sort Order</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="sort_order" value="{{ old('sort_order', $model->sort_order ?? 0) }}" min="0">
            </div>
        </div>

        @if(!empty($isEdit))
        <div class="form-group">
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-9">
                <select name="status" class="form-control">
                    <option value="1" {{ (string) old('status', $model->status ?? '1') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ (string) old('status', $model->status ?? '1') === '0' ? 'selected' : '' }}>In-Active</option>
                </select>
            </div>
        </div>
        @endif

        <div class="form-group">
            <label class="col-sm-2 control-label">Service Options</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="options_text" rows="12" placeholder="One option per line&#10;Full-Service Payroll&#10;Direct Deposit">{{ $optionsText }}</textarea>
                <p class="help-block">
                    Enter <strong>one option per line</strong>. These become the checkboxes on the Gusto shop form.
                    Saving replaces the current option list for this service.
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-success pull-left">Save Service</button>
            </div>
        </div>
    </div>
</div>
