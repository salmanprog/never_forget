@extends('layouts.admin.master')

@section('title', 'Create Business Card Option')

@section('content')
<div class="page-wrap">
    <div class="page-content">
        <div class="page-header">
            <h1 class="page-title">Create Business Card Option</h1>
            <div class="page-header-actions">
                <a href="{{ route('admin.business-card-options.index') }}" class="btn btn-secondary">
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
                    <form method="POST" action="{{ route('admin.business-card-options.store') }}">
                        @csrf

                        <div class="form-row">
                            <!-- Option Type -->
                            <div class="form-group col-md-6">
                                <label for="option_type" class="form-label">Option Type <span class="text-danger">*</span></label>
                                <select name="option_type" id="option_type" class="form-control @error('option_type') is-invalid @enderror" required>
                                    <option value="">Select Option Type</option>
                                    @foreach($optionTypes as $key => $name)
                                        <option value="{{ $key }}" {{ old('option_type') == $key ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('option_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                       class="form-control @error('option_key') is-invalid @enderror" 
                                       value="{{ old('option_key') }}" 
                                       placeholder="e.g., matte, glossy, rounded"
                                       required>
                                @error('option_key')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name') }}" 
                                       placeholder="e.g., Matte Finish, Glossy Finish"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                       class="form-control @error('sort_order') is-invalid @enderror" 
                                       value="{{ old('sort_order', 100) }}" 
                                       min="0"
                                       required>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                      class="form-control @error('description') is-invalid @enderror" 
                                      rows="3" 
                                      placeholder="Brief description of this option...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                                           class="form-control @error('price_modifier') is-invalid @enderror" 
                                           value="{{ old('price_modifier', 0) }}" 
                                           step="0.01"
                                           min="-999"
                                           max="999"
                                           required>
                                </div>
                                @error('price_modifier')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                               {{ old('is_active', true) ? 'checked' : '' }}>
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
@endsection

@push('styles')
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
@endpush
