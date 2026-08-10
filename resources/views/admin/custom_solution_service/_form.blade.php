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
                <input type="text" class="form-control" name="title" value="{{ old('title', $model->title ?? '') }}" required placeholder="e.g. Appreciation Services">
                <span style="color: red">{{ $errors->first('title') }}</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="description" rows="3" placeholder="Short description shown on the service card">{{ old('description', $model->description ?? '') }}</textarea>
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
            <label class="col-sm-2 control-label">Card Image</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" name="image" id="service_image" accept="image/*">
                <span style="color: red">{{ $errors->first('image') }}</span>
                <p class="help-block">Recommended: landscape image for the front cards.</p>
            </div>
            <div class="col-sm-3">
                <img id="service_image_preview"
                    src="{{ !empty($model) ? $model->image_url : asset('public/admin/assets/images/default.jpg') }}"
                    style="width:100px;height:100px;object-fit:cover;border-radius:6px;" alt="Preview">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Service Options</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="options_text" rows="12" placeholder="One option per line&#10;Employee Appreciation&#10;Customer Appreciation&#10;Birthday Recognition">{{ $optionsText }}</textarea>
                <p class="help-block">
                    Enter <strong>one option per line</strong>. These become the checkboxes on the public form.
                    Saving replaces the current option list for this service.
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Other Text Box</label>
            <div class="col-sm-9">
                <label style="font-weight:normal;">
                    <input type="checkbox" name="has_other_text" value="1"
                        {{ old('has_other_text', !empty($model) && $model->has_other_text) ? 'checked' : '' }}>
                    Show a large “describe other services” text box when “Other Services” is selected
                </label>
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

@push('js')
<script>
    $('#service_image').on('change', function () {
        const [file] = this.files;
        if (file) $('#service_image_preview').attr('src', URL.createObjectURL(file));
    });
</script>
@endpush
