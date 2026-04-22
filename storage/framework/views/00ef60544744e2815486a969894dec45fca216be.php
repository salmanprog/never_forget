

<?php $__env->startSection('title', 'Create Business Card Option'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-wrap">
    <div class="page-content">
        <div class="page-header">
            <h1 class="page-title">Create Business Card Option</h1>
            <div class="page-header-actions">
                <a href="<?php echo e(route('admin.business-card-options.index')); ?>" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i> Back to Options
                </a>
            </div>
        </div>

        <div class="page-body">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Option</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route('admin.business-card-options.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-row">
                            <!-- Option Type -->
                            <div class="form-group col-md-6">
                                <label for="option_type" class="form-label">Option Type <span class="text-danger">*</span></label>
                                <select name="option_type" id="option_type" class="form-control <?php $__errorArgs = ['option_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <option value="">Select Option Type</option>
                                    <?php $__currentLoopData = $optionTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e(old('option_type') == $key ? 'selected' : ''); ?>>
                                            <?php echo e($name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['option_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <small class="form-text text-muted">
                                    Choose the category this option belongs to
                                </small>
                            </div>

                            <!-- Option Key -->
                            <div class="form-group col-md-6">
                                <label for="option_key" class="form-label">Option Key <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="option_key" 
                                       id="option_key" 
                                       class="form-control <?php $__errorArgs = ['option_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       value="<?php echo e(old('option_key')); ?>" 
                                       placeholder="e.g., matte, glossy, rounded"
                                       required>
                                <?php $__errorArgs = ['option_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <small class="form-text text-muted">
                                    Unique identifier (lowercase, underscores only)
                                </small>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Name -->
                            <div class="form-group col-md-6">
                                <label for="name" class="form-label">Display名 Name <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="name" 
                                       id="name" 
                                       class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       value="<?php echo e(old('name')); ?>" 
                                       placeholder="e.g., Matte Finish, Glossy Finish"
                                       required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <small class="form-text text-muted">
                                    This will be shown to customers
                                </small>
                            </div>

                            <!-- Sort Order -->
                            <div class="form-group col-md-6">
                                <label for="sort_order" class="form-label">Sort Order <span class="text-danger">*</span></label>
                                <input type="number" 
                                       name="sort_order" 
                                       id="sort_order" 
                                       class="form-control <?php $__errorArgs = ['sort_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                       value="<?php echo e(old('sort_order', 100)); ?>" 
                                       min="0"
                                       required>
                                <?php $__errorArgs = ['sort_order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <small class="form-text text-muted">
                                    Lower numbers appear first
                                </small>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" 
                                      id="description" 
                                      class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      rows="3" 
                                      placeholder="Brief description of this option..."><?php echo e(old('description')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="form-text text-muted">
                                Optional: Describe what this option offers to customers
                            </small>
                        </div>

                        <div class="form-row">
                            <!-- Price Modifier -->
                            <div class="form-group col-md-6">
                                <label for="price_modifier" class="form-label">Price Modifier <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" 
                                           name="price_modifier" 
                                           id="price_modifier" 
                                           class="form-control <?php $__errorArgs = ['price_modifier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           value="<?php echo e(old('price_modifier', 0)); ?>" 
                                           step="0.01"
                                           min="-999"
                                           max="999"
                                           required>
                                </div>
                                <?php $__errorArgs = ['price_modifier'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <small class="form-text text-muted">
                                    Additional cost (+) or discount (-) per card
                                </small>
                            </div>

                            <!-- Active Status -->
                            <div class="form-group col-md-6">
                                <label class="form-label">Status</label>
                                <div class="mt-2">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" 
                                               name="is_active" 
                                               class="custom-control-input" 
                                               id="is_active" 
                                               value="1"
                                               <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                                        <label class="custom-control-label" for="is_active">
                                            Active (Visible to customers)
                                        </label>
                                    </div>
                                </div>
                                <small class="form-text text-muted">
                                    Inactive options won't be shown to customers
                                </small>
                            </div>
                        </div>

                        <!-- Preview Card -->
                        <div class="form-group">
                            <label class="form-label">Preview</label>
                            <div class="preview-card">
                                <div class="card-option-preview">
                                    <h5 id="preview_name">Option Name</h5>
                                    <p id="preview_description" class="text-muted">Description will appear here</p>
                                    <span id="preview_price" class="price-tag">$0.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i> Create Option
                            </button>
                            <button type="button" class="btn btn-secondary" onclick="window.history.back()">
                                <i class="fa fa-times"></i> Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Auto-update preview script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const descriptionInput = document.getElementById('description');
    const priceInput = document.getElementById('price_modifier');
    const optionTypeSelect = document.getElementById('option_type');

    function updatePreview() {
        const name = nameInput.value || 'Option Name';
        const description = descriptionInput.value || 'Description will appear here';
        const price = parseFloat(priceInput.value) || 0;

        document.getElementById('preview_name').textContent = name;
        document.getElementById('preview_description').textContent = description;
        
        let priceText = '$0.00';
        if (price > 0) {
            priceText = `+$${price.toFixed(2)}`;
        } else if (price < 0) {
            priceText = `$${price.toFixed(2)}`;
        }
        document.getElementById('preview_price').textContent = priceText;
    }

    nameInput.addEventListener('input', updatePreview);
    descriptionInput.addEventListener('input', updatePreview);
    priceInput.addEventListener('input', updatePreview);

    // Auto-generate option_key based on name
    nameInput.addEventListener('input', function() {
        let optionKey = this.value
            .toLowerCase()
            .replace(/[^a-z0-9\s]/g, '')
            .replace(/\s+/g, '_');
        
        document.getElementById('option_key').value = optionKey;
    });

    // Update initial preview
    updatePreview();
});
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .form-actions {
        text-align: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #dee2e6;
    }

    .form-actions .btn {
        margin: 0 0.5rem;
        padding: 0.75rem 2rem;
        min-width: 150px;
    }

    .preview-card {
        background: #f8f9fa;
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
    }

    .card-option-preview {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        max-width: 300px;
        margin: 0 auto;
    }

    .card-option-preview h5 {
        margin-bottom: 10px;
        color: #495057;
    }

    .card-option-preview p {
        margin-bottom: 15px;
    }

    .price-tag {
        background: #007bff;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 14px;
    }

    .input-group-prepend .input-group-text {
        background-color: #e9ecef;
        border-color: #ced4da;
    }

    .text-danger {
        color: #dc3545 !important;
    }

    .form-text {
        font-size: 0.875rem;
        color: #6c757d;
    }

    @media (max-width: 768px) {
        .form-row .form-group:not(:last-child) {
            margin-bottom: 1rem;
        }
        
        .form-actions .btn {
            display: block;
            width: 100%;
            margin-bottom: 1rem;
        }
        
        .form-actions .btn:last-child {
            margin-bottom: 0;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\business-card-options\create.blade.php ENDPATH**/ ?>