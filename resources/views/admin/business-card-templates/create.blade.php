@extends('layouts.admin')

@section('title', 'Create Business Card Template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Business Card Template</h3>
                    <div class="card-tools">
                        <a href="{{ route('business_card_templates.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Templates
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('business_card_templates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Template Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category <span class="text-danger">*</span></label>
                                    <select class="form-control @error('category') is-invalid @enderror" 
                                            id="category" name="category" required>
                                        <option value="">Select Category</option>
                                        <option value="corporate" {{ old('category') == 'corporate' ? 'selected' : '' }}>Corporate</option>
                                        <option value="creative" {{ old('category') == 'creative' ? 'selected' : '' }}>Creative</option>
                                        <option value="minimal" {{ old('category') == 'minimal' ? 'selected' : '' }}>Minimal</option>
                                        <option value="modern" {{ old('category') == 'modern' ? 'selected' : '' }}>Modern</option>
                                        <option value="elegant" {{ old('category') == 'elegant' ? 'selected' : '' }}>Elegant</option>
                                        <option value="general" {{ old('category') == 'general' ? 'selected' : '' }}>General</option>
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="preview_image">Preview Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('preview_image') is-invalid @enderror" 
                                           id="preview_image" name="preview_image" accept="image/*" required>
                                    <small class="form-text text-muted">Recommended size: 400x300px</small>
                                    @error('preview_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="background_image">Background Image</label>
                                    <input type="file" class="form-control @error('background_image') is-invalid @enderror" 
                                           id="background_image" name="background_image" accept="image/*">
                                    <small class="form-text text-muted">Optional background image for the template</small>
                                    @error('background_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="background_color">Background Color <span class="text-danger">*</span></label>
                                    <input type="color" class="form-control @error('background_color') is-invalid @enderror" 
                                           id="background_color" name="background_color" value="{{ old('background_color', '#ffffff') }}" required>
                                    @error('background_color')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sort_order">Sort Order</label>
                                    <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                           id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                    @error('sort_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Available Colors</label>
                                    <div class="color-picker-container">
                                        <div class="row">
                                            <div class="col-3">
                                                <input type="color" name="available_colors[]" value="#ffffff" class="form-control">
                                            </div>
                                            <div class="col-3">
                                                <input type="color" name="available_colors[]" value="#f8fafc" class="form-control">
                                            </div>
                                            <div class="col-3">
                                                <input type="color" name="available_colors[]" value="#1e293b" class="form-control">
                                            </div>
                                            <div class="col-3">
                                                <input type="color" name="available_colors[]" value="#2563eb" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Available Fonts</label>
                                    <div class="font-picker-container">
                                        <select name="available_fonts[]" class="form-control" multiple>
                                            <option value="Arial" selected>Arial</option>
                                            <option value="Helvetica" selected>Helvetica</option>
                                            <option value="Times New Roman">Times New Roman</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Verdana">Verdana</option>
                                            <option value="Roboto">Roboto</option>
                                            <option value="Open Sans">Open Sans</option>
                                            <option value="Lato">Lato</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Poppins">Poppins</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_premium" name="is_premium" value="1" {{ old('is_premium') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_premium">
                                            Premium Template
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active Template
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Create Template
                            </button>
                            <a href="{{ route('business_card_templates.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .color-picker-container .form-control {
        height: 50px;
    }
    
    .font-picker-container select {
        height: 100px;
    }
</style>
@endpush
