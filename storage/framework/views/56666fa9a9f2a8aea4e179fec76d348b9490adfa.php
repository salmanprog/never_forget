<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1>Add Products</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route('product.index')); ?>" class="btn btn-primary btn-sm">View All</a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(route('product.store')); ?>" id="regform" class="form-horizontal"
                    enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <?php echo csrf_field(); ?>
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" name="name"
                                        value="<?php echo e(old('name')); ?>" placeholder="Enter product name">
                                    <span style="color: red"><?php echo e($errors->first('name')); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2" style="text-align: end;">
                                    <label for="" class="control-label">Category</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="category_id" id="category_id" class="form-control get_sub_category">
                                        <option value="" selected> Select Category</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first('category_id')); ?></span>
                                </div> 
                            </div>
                            <div class="form-group">
                                <div class="col-md-2" style="text-align: end;">
                                    <label for="" class="control-label">Product Type</label>
                                </div>
                                <div class="col-md-9">
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option value="0" selected> Simple Product</option>
                                        <option value="1"> Variable Product</option>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first('product_type')); ?></span>
                                </div>
                            </div> 

                            <div class="form-group" id="productPrice">
                                <div class="col-md-2" style="text-align: end;">
                                    <label for="" class="control-label">Product Price</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" autocomplete="off" class="form-control" name="product_price"
                                        value="<?php echo e(old('product_price')); ?>" placeholder="Enter product Price">
                                    <span style="color: red"><?php echo e($errors->first('product_price')); ?></span>
                                </div>
                            </div>

                            <div class="form-group" id="variablePrice" style="display: none;">
                                <div class="col-md-2" style="text-align: end;">
                                    <label for="" class="control-label">Price Range</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" autocomplete="off" class="form-control" name="from_price"
                                                value="<?php echo e(old('from_price')); ?>" placeholder="From Price">
                                            <span style="color: red"><?php echo e($errors->first('from_price')); ?></span>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" autocomplete="off" class="form-control" name="to_price"
                                                value="<?php echo e(old('to_price')); ?>" placeholder="To Price">
                                            <span style="color: red"><?php echo e($errors->first('to_price')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="variationsSection" style="display: none;">
                                <label for="" class="col-sm-2 control-label">Variations</label>
                                <div class="col-sm-9">
                                    <table id="form-table" class="table">
                                        <tbody>
                                            <tr class="form-row">
                                                <td style="width:25%">
                                                    <select name="variation_id[]" id="variation_id"
                                                        class="form-control select2">
                                                        <option value="0" selected> Select Option</option>
                                                        <?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($variation->id); ?>"><?php echo e($variation->name); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                    <span style="color: red"><?php echo e($errors->first('variation_id')); ?></span>
                                                </td>
                                                <td style="width:25%">
                                                    <input type="text" autocomplete="off" name="variation_price[]"
                                                        class="form-control" value="<?php echo e(old('variation_price[]')); ?>"
                                                        placeholder="Enter Price">
                                                </td>
                                                <td style="width:30%">
                                                    <div class="variation-image-container">
                                                        <div class="variation-image-wrapper">
                                                            <img style="width: 80px; cursor: pointer;" class="variation-image-preview" src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" alt="Click to upload image">
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
                                    <span style="color: red"><?php echo e($errors->first('images')); ?></span>
                                </div>
                                <div class="col-sm-4">
                                    <div id="image_preview" class="d-flex flex-wrap gap-2">
                                        <!-- Preview images will be shown here -->
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Description </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control texteditor" name="description" style="height:200px;" placeholder="Enter description"></textarea>
                                    <span style="color: red"><?php echo e($errors->first('description')); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Product Details </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control texteditor" name="short_description" style="height:200px;"
                                        placeholder="Enter short description"></textarea>
                                    <span style="color: red"><?php echo e($errors->first('short_description')); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Related Products </label>
                                <div class="col-sm-9">
                                    <select name="related_product[]" id="related_product"
                                        class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        multiple="" data-placeholder="Select related products" tabindex="-1"
                                        aria-hidden="true" class="form-control">
                                        <?php $__currentLoopData = $relateds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option data-select2-id="<?php echo e($related->id); ?>" value="<?php echo e($related->id); ?>">
                                                <?php echo e($related->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span style="color: red"><?php echo e($errors->first('related_product')); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
                                </div>
                            </div> 
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
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

            // Trigger the change event on page load to set initial state
            $('#product_type').trigger('change');

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
                            <?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($variation->id); ?>"><?php echo e($variation->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td style="width:25%">
                        <input type="text" autocomplete="off" name="variation_price[]" class="form-control" placeholder="Enter Price">
                    </td>
                    <td style="width:30%">
                        <div class="variation-image-container">
                            <div class="variation-image-wrapper">
                                <img style="width: 80px; cursor: pointer;" class="variation-image-preview" src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" alt="Click to upload image">
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
                } else {
                    /* alert('You must have at least one variation row.'); */
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

            image.onchange = evt => {
                const [file] = image.files
                if (file) {
                    banner_preview.src = URL.createObjectURL(file)
                }
            }
        });
    </script>
    <script>
        var csrf_token = "<?php echo e(csrf_token()); ?>";
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\product\create.blade.php ENDPATH**/ ?>