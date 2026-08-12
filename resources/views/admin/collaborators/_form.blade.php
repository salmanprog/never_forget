@php
    $isEdit = !empty($model);
    $faqRows = old('faq_questions')
        ? collect(old('faq_questions'))->map(function ($q, $i) {
            return ['question' => $q, 'answer' => old('faq_answers.' . $i)];
        })
        : ($isEdit ? $model->faqs : collect([['question' => '', 'answer' => '']]));
    if ($faqRows instanceof \Illuminate\Support\Collection && $faqRows->isEmpty()) {
        $faqRows = collect([['question' => '', 'answer' => '']]);
    }
@endphp

<div class="box box-info">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="title" value="{{ old('title', $model->title ?? '') }}" required placeholder="Collaborator name">
                <span style="color: red">{{ $errors->first('title') }}</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Short Description</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="short_description" maxlength="500"
                    value="{{ old('short_description', $model->short_description ?? '') }}"
                    placeholder="Short line for listing / SEO">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Logo / Image {{ $isEdit ? '' : '' }}</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" accept="image/*" name="image" id="image">
                <span style="color: red">{{ $errors->first('image') }}</span>
            </div>
            <div class="col-sm-3">
                <img style="width: 80px; height: 80px; object-fit: contain;" id="banner_preview"
                    src="{{ $isEdit && !empty($model->image) ? $model->image_url : asset('public/admin/assets/images/default.jpg') }}"
                    alt="Preview">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Sort Order</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="sort_order" min="0"
                    value="{{ old('sort_order', $model->sort_order ?? 0) }}">
            </div>
        </div>

        @if($isEdit)
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

        <hr>
        <h4 class="col-sm-offset-2" style="margin-left:16.666%; margin-bottom:20px;">Page Content (fixed sections)</h4>

        <div class="form-group">
            <label class="col-sm-2 control-label">Overview</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="overview" rows="5" placeholder="Overview content">{{ old('overview', $model->overview ?? '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Services</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="services_text" rows="6" placeholder="One service per line">{{ old('services_text', $isEdit ? $model->listToText('services') : '') }}</textarea>
                <p class="help-block">One item per line. Shown as bullets on the public page.</p>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Features</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="features_text" rows="6" placeholder="One feature per line">{{ old('features_text', $isEdit ? $model->listToText('features') : '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Benefits</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="benefits_text" rows="6" placeholder="One benefit per line">{{ old('benefits_text', $isEdit ? $model->listToText('benefits') : '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Industries Served</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="industries_text" rows="5" placeholder="One industry per line">{{ old('industries_text', $isEdit ? $model->listToText('industries_served') : '') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Why Choose This Collaborator</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="why_choose" rows="5" placeholder="Why choose content">{{ old('why_choose', $model->why_choose ?? '') }}</textarea>
            </div>
        </div>

        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label">FAQs</label>
            <div class="col-sm-9">
                <div id="faq-rows">
                    @foreach($faqRows as $faq)
                        <div class="faq-row panel panel-default" style="padding:12px; margin-bottom:10px; border:1px solid #ddd;">
                            <input type="text" class="form-control" name="faq_questions[]" value="{{ is_array($faq) ? ($faq['question'] ?? '') : ($faq->question ?? '') }}" placeholder="Question" style="margin-bottom:8px;">
                            <textarea class="form-control" name="faq_answers[]" rows="2" placeholder="Answer">{{ is_array($faq) ? ($faq['answer'] ?? '') : ($faq->answer ?? '') }}</textarea>
                            <button type="button" class="btn btn-danger btn-xs remove-faq" style="margin-top:8px;">Remove</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-info btn-sm" id="add-faq">+ Add FAQ</button>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-6">
                <button type="submit" class="btn btn-success pull-left">Save Collaborator</button>
                @if($isEdit && !empty($model->slug))
                    <a href="{{ route('collaborators.show', $model->slug) }}" target="_blank" class="btn btn-default" style="margin-left:8px;">Preview Page</a>
                @endif
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    (function () {
        var imageInput = document.getElementById('image');
        var preview = document.getElementById('banner_preview');
        if (imageInput && preview) {
            imageInput.onchange = function () {
                var file = this.files && this.files[0];
                if (file) preview.src = URL.createObjectURL(file);
            };
        }

        $('#add-faq').on('click', function () {
            $('#faq-rows').append(
                '<div class="faq-row panel panel-default" style="padding:12px; margin-bottom:10px; border:1px solid #ddd;">' +
                    '<input type="text" class="form-control" name="faq_questions[]" placeholder="Question" style="margin-bottom:8px;">' +
                    '<textarea class="form-control" name="faq_answers[]" rows="2" placeholder="Answer"></textarea>' +
                    '<button type="button" class="btn btn-danger btn-xs remove-faq" style="margin-top:8px;">Remove</button>' +
                '</div>'
            );
        });

        $(document).on('click', '.remove-faq', function () {
            if ($('#faq-rows .faq-row').length > 1) {
                $(this).closest('.faq-row').remove();
            } else {
                $(this).closest('.faq-row').find('input, textarea').val('');
            }
        });
    })();
</script>
@endpush
