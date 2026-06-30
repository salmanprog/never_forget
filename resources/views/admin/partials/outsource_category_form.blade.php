<section class="content-header">
    <div class="content-header-left"><h1>{{ $page_title }}</h1></div>
    <div class="content-header-right">
        @if(!empty($isEdit)) @include('includes.buttons.back') @endif
        <a href="{{ route($backRoute) }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ $formAction }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post">
                @csrf
                @if(!empty($isEdit)) @method('PATCH') @endif
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" value="{{ old('title', $model->title ?? '') }}" required>
                                <span style="color: red">{{ $errors->first('title') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" rows="4">{{ old('description', $model->description ?? '') }}</textarea>
                            </div>
                        </div>
                        @if($defaultButtonText !== null)
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Button Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="button_text" value="{{ old('button_text', $model->button_text ?? $defaultButtonText) }}">
                            </div>
                        </div>
                        @endif
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
                                    <option value="1" {{ ($model->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ ($model->status ?? 1) == 0 ? 'selected' : '' }}>In-Active</option>
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                <span style="color: red">{{ $errors->first('image') }}</span>
                            </div>
                            <div class="col-sm-4">
                                <img id="banner_preview" src="{{ $previewImage }}" style="width: 80px" alt="Preview">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@push('js')
<script>
    $(document).ready(function() {
        $("#regform").validate({ rules: { title: "required" } });
        $('#image').on('change', function() {
            const [file] = this.files;
            if (file) $('#banner_preview').attr('src', URL.createObjectURL(file));
        });
    });
</script>
@endpush
