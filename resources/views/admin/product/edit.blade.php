@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
    <section class="content-header">
        <div class="content-header-left">
            <h1>Edit Products</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm">View All</a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('product.update', $details->slug) }}" id="regform"
                    class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" name="name"
                                        value="{{ $details->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2" style="text-align: end;">
                                    <label for="" class="control-label">Category</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="category_id" id="category_id" class="form-control get_sub_category">
                                        <option value="" selected> Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $details->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{ $errors->first('category_id') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2" style="text-align: end;">
                                    <label for="" class="control-label">Product Type</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option value="0" {{ $details->product_type == 0 ? 'selected' : '' }}> Simple Product</option>
                                        <option value="1" {{ $details->product_type == 1 ? 'selected' : '' }}> Variable Product</option>
                                    </select>
                                    <span style="color: red">{{ $errors->first('product_type') }}</span>
                                </div>
                            </div>
                            <div class="form-group" id="productPrice" style="display: {{ $details->product_type == 0 ? 'block' : 'none' }};">
                                <div class="col-md-2" style="text-align: end;">
                                    <label for="" class="control-label">Product Price</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" class="form-control" name="product_price"
                                        value="{{ $details->product_price }}" placeholder="Enter product Price">
                                    <span style="color: red">{{ $errors->first('product_price') }}</span>
                                </div>
                            </div>

                            <div class="form-group" id="variablePrice" style="display: {{ $details->product_type == 1 ? 'block' : 'none' }};">
                                <div class="col-md-2" style="text-align: end;">
                                    <label for="" class="control-label">Price Range</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" autocomplete="off" class="form-control" name="from_price"
                                                value="{{ json_decode($details->variation_price)->from ?? '' }}" placeholder="From Price">
                                            <span style="color: red">{{ $errors->first('from_price') }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" autocomplete="off" class="form-control" name="to_price"
                                                value="{{ json_decode($details->variation_price)->to ?? '' }}" placeholder="To Price">
                                            <span style="color: red">{{ $errors->first('to_price') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="variationsSection" style="display: {{ $details->product_type == 1 ? 'block' : 'none' }};">
                                <label for="" class="col-sm-2 control-label">Variations</label>
                                <div class="col-sm-9">
                                    <table id="form-table" class="table">
                                        <tbody>
                                            @if(isset($product_variations) && count($product_variations) > 0)
                                                @foreach($product_variations as $variation)
                                                <tr class="form-row">
                                                    <td style="width:25%">
                                                        <select name="variation_id[]" class="form-control select2">
                                                            <option value="0" selected> Select Option</option>
                                                            @foreach ($variations as $var)
                                                                <option value="{{ $var->id }}" {{ $variation['variation_id'] == $var->id ? 'selected' : '' }}>{{ $var->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td style="width:25%">
                                                        <input type="text" autocomplete="off" name="variation_price[]"
                                                            class="form-control" value="{{ $variation['price'] }}"
                                                            placeholder="Enter Price">
                                                    </td>
                                                    <td style="width:30%">
                                                        <div class="variation-image-container">
                                                            <div class="variation-image-wrapper">
                                                                <img style="width: 80px; cursor: pointer;" class="variation-image-preview" 
                                                                    src="{{ isset($variation['image']) ? asset('public/admin/assets/images/product/variations') . '/' . $variation['image'] : asset('public/admin/assets/images/default.jpg') }}" 
                                                                    alt="Click to upload image">
                                                                <div class="variation-image-overlay">
                                                                    <i class="fa fa-upload"></i>
                                                                </div>
                                                            </div>
                                                            <input type="file" class="variation-image" name="variation_image[]" accept="image/*" style="display: none;">
                                                        </div>
                                                    </td>
                                                    <td style="width:10%">
                                                        <button type="button" class="remove-row btn btn-danger">Remove</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr class="form-row">
                                                    <td style="width:25%">
                                                        <select name="variation_id[]" class="form-control select2">
                                                            <option value="0" selected> Select Option</option>
                                                            @foreach ($variations as $variation)
                                                                <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td style="width:25%">
                                                        <input type="text" autocomplete="off" name="variation_price[]"
                                                            class="form-control" placeholder="Enter Price">
                                                    </td>
                                                    <td style="width:30%">
                                                        <div class="variation-image-container">
                                                            <div class="variation-image-wrapper">
                                                                <img style="width: 80px; cursor: pointer;" class="variation-image-preview" 
                                                                    src="{{ asset('public/admin/assets/images/default.jpg') }}" 
                                                                    alt="Click to upload image">
                                                                <div class="variation-image-overlay">
                                                                    <i class="fa fa-upload"></i>
                                                                </div>
                                                            </div>
                                                            <input type="file" class="variation-image" name="variation_image[]" accept="image/*" style="display: none;">
                                                        </div>
                                                    </td>
                                                    <td style="width:10%">
                                                        <button type="button" class="remove-row btn btn-danger">Remove</button>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    <button type="button" id="add-row" class="btn btn-primary"
                                        style="float: right; margin-right: 5px;">Add More Variation</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Product Images</label>
                                <div class="col-sm-6" style="padding-top:5px">
                                    <input type="file" class="form-control" accept="image/*" name="images[]"
                                        id="images" multiple>
                                    <span style="color: red">{{ $errors->first('images') }}</span>
                                </div>
                                <div class="col-sm-4">
                                    <div id="image_preview" class="d-flex flex-wrap gap-2">
                                        @if($details->image)
                                            <div class="image-container" style="position: relative; display: inline-block;">
                                                <img src="{{ asset('public/admin/assets/images/product') }}/{{ $details->image }}" 
                                                    style="width: 80px; height: 80px; object-fit: cover; margin: 5px;" alt="Main Image">
                                                <button type="button" class="btn btn-danger btn-sm remove-image" 
                                                    style="position: absolute; top: 0; right: 0; padding: 2px 5px;"
                                                    data-image="{{ $details->image }}" data-type="main">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        @endif
                                        @if($details->related_images)
                                            @foreach(json_decode($details->related_images) as $relatedImage)
                                                <div class="image-container" style="position: relative; display: inline-block;">
                                                    <img src="{{ asset('public/admin/assets/images/product') }}/{{ $relatedImage }}" 
                                                        style="width: 80px; height: 80px; object-fit: cover; margin: 5px;" alt="Related Image">
                                                    <button type="button" class="btn btn-danger btn-sm remove-image" 
                                                        style="position: absolute; top: 0; right: 0; padding: 2px 5px;"
                                                        data-image="{{ $relatedImage }}" data-type="related">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Description </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control texteditor" name="description" style="height:200px;">{!! $details->description !!}</textarea>
                                    <span style="color: red">{{ $errors->first('description') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Product Details </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control texteditor" name="short_description" style="height:200px;">{!! $details->short_description !!}</textarea>
                                    <span style="color: red">{{ $errors->first('short_description') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Related Products </label>
                                <div class="col-sm-9">
                                    <select name="related_product[]" id="related_product"
                                        class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        multiple="" data-placeholder="Select related products" tabindex="-1"
                                        aria-hidden="true">
                                        @foreach ($relateds as $related)
                                            @php
                                                $isSelected = [];
                                                if ($details->related_product !== null) {
                                                    $isSelected = in_array($related->id, json_decode($details->related_product));
                                                }
                                                $selected = $isSelected ? 'selected' : '';
                                            @endphp
                                            <option data-select2-id="{{ $related->id }}" value="{{ $related->id }}"
                                                {{ $selected }}>{{ $related->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">{{ $errors->first('related_product') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control" id="">
                                        <option value="1" {{ $details->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $details->status == 0 ? 'selected' : '' }}>In-Active
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label"></label>
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

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // Product type change handler
            $('#product_type').on('change', function() {
                var productType = $(this).val();
                if (productType == '1') { // Variable Product
                    $('#variationsSection').show();
                    $('#productPrice').hide();
                    $('#variablePrice').show();
                } else { // Simple Product
                    $('#variationsSection').hide();
                    $('#productPrice').show();
                    $('#variablePrice').hide();
                }
            });

            // Initialize select2 for existing variation dropdowns
            $('.select2').select2();

            // Handle adding new variation rows
            $('#add-row').on('click', function() {
                var rowCount = $('#form-table tbody tr').length;
                var newRow = `
                <tr class="form-row">
                    <td style="width:25%">
                        <select name="variation_id[]" class="form-control select2" id="variation_id_${rowCount}">
                            <option value="0" selected> Select Option</option>
                            @foreach ($variations as $variation)
                                <option value="{{ $variation->id }}">{{ $variation->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="width:25%">
                        <input type="text" autocomplete="off" name="variation_price[]" class="form-control" placeholder="Enter Price">
                    </td>
                    <td style="width:30%">
                        <div class="variation-image-container">
                            <div class="variation-image-wrapper">
                                <img style="width: 80px; cursor: pointer;" class="variation-image-preview" src="{{ asset('public/admin/assets/images/default.jpg') }}" alt="Click to upload image">
                                <div class="variation-image-overlay">
                                    <i class="fa fa-upload"></i>
                                </div>
                            </div>
                            <input type="file" class="variation-image" name="variation_image[]" accept="image/*" style="display: none;">
                        </div>
                    </td>
                    <td style="width:10%">
                        <button type="button" class="remove-row btn btn-danger">Remove</button>
                    </td>
                </tr>`;
                
                $('#form-table tbody').append(newRow);
                
                // Initialize select2 for the new dropdown
                $('#variation_id_' + rowCount).select2();
            });

            // Handle removing variation rows
            $(document).on('click', '.remove-row', function() {
                if ($('#form-table tbody tr').length > 1) {
                    $(this).closest('tr').remove();
                }
            });

            // Handle variation image preview
            $(document).on('change', '.variation-image', function() {
                var file = this.files[0];
                var preview = $(this).siblings('.variation-image-wrapper').find('.variation-image-preview');
                
                if (file) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                        preview.attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(file);
                }
            });

            // Handle click on image to trigger file input
            $(document).on('click', '.variation-image-wrapper', function() {
                $(this).siblings('.variation-image').click();
            });

            if ($(".texteditor").length > 0) {
                tinymce.init({
                    selector: "textarea.texteditor",
                    theme: "modern",
                    height: 150,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                });
            }

            // Handle image removal
            $(document).on('click', '.remove-image', function() {
                var image = $(this).data('image');
                var type = $(this).data('type');
                var $container = $(this).closest('.image-container');
                
                // Create or get the removed_images input
                var $removedInput = $('#removed_images');
                if (!$removedInput.length) {
                    $removedInput = $('<input>').attr({
                        type: 'hidden',
                        name: 'removed_images[]',
                        id: 'removed_images'
                    }).appendTo('form');
                }
                
                // Add the image to the removed_images array
                var currentRemoved = $removedInput.val() ? $removedInput.val().split(',') : [];
                if (!currentRemoved.includes(image)) {
                    currentRemoved.push(image);
                    $removedInput.val(currentRemoved.join(','));
                }
                
                // Remove the image container from the preview
                $container.remove();
            });

            // Handle form submission
            $('form').on('submit', function() {
                // Ensure removed_images is properly formatted as array
                var $removedInput = $('#removed_images');
                if ($removedInput.length) {
                    var removedImages = $removedInput.val() ? $removedInput.val().split(',') : [];
                    $removedInput.val(removedImages.join(','));
                }
            });

            // Handle new image preview
            document.getElementById('images').addEventListener('change', function(event) {
                const preview = document.getElementById('image_preview');
                const files = event.target.files;
                
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const container = document.createElement('div');
                            container.className = 'image-container';
                            container.style.position = 'relative';
                            container.style.display = 'inline-block';
                            
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.width = '80px';
                            img.style.height = '80px';
                            img.style.objectFit = 'cover';
                            img.style.margin = '5px';
                            
                            const removeBtn = document.createElement('button');
                            removeBtn.type = 'button';
                            removeBtn.className = 'btn btn-danger btn-sm remove-new-image';
                            removeBtn.style.position = 'absolute';
                            removeBtn.style.top = '0';
                            removeBtn.style.right = '0';
                            removeBtn.style.padding = '2px 5px';
                            removeBtn.innerHTML = '<i class="fa fa-times"></i>';
                            
                            container.appendChild(img);
                            container.appendChild(removeBtn);
                            preview.appendChild(container);
                        }
                        reader.readAsDataURL(file);
                    }
                }
            });

            // Handle removal of newly added images
            $(document).on('click', '.remove-new-image', function() {
                $(this).closest('.image-container').remove();
            });
        });
    </script>
    <script>
        var csrf_token = "{{ csrf_token() }}";
    </script>
    
    <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const preview = document.getElementById('image_preview');
            preview.innerHTML = ''; // Clear existing previews

            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '80px';
                        img.style.height = '80px';
                        img.style.objectFit = 'cover';
                        img.style.margin = '5px';
                        preview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
@endpush

@push('css')
<style>
    .variation-image-container {
        position: relative;
        display: inline-block;
    }
    
    .variation-image-wrapper {
        position: relative;
        display: inline-block;
    }
    
    .variation-image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        cursor: pointer;
    }
    
    .variation-image-wrapper:hover .variation-image-overlay {
        opacity: 1;
    }
    
    .variation-image-overlay i {
        color: white;
        font-size: 20px;
    }
</style>
@endpush
