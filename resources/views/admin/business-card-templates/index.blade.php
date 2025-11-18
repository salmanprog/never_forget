@extends('layouts.admin.app')
@section('title', $page_title)

@section('title', 'Business Card Templates')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Business Card Templates</h3>
                    <div class="card-tools">
                        <a href="{{ route('business_card_templates.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New Template
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($templates as $template)
                                <tr>
                                    <td>
                                        <img src="{{ asset($template->preview_image) }}" 
                                             alt="{{ $template->name }}" 
                                             class="img-thumbnail" 
                                             style="width: 80px; height: 60px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <strong>{{ $template->name }}</strong>
                                        @if($template->description)
                                        <br><small class="text-muted">{{ Str::limit($template->description, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ ucfirst($template->category) }}</span>
                                    </td>
                                    <td>
                                        @if($template->is_premium)
                                        <span class="badge badge-warning">Premium</span>
                                        @else
                                        <span class="badge badge-success">Free</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm {{ $template->is_active ? 'btn-success' : 'btn-secondary' }} toggle-active-btn" 
                                                data-id="{{ $template->id }}" 
                                                data-active="{{ $template->is_active }}">
                                            {{ $template->is_active ? 'Active' : 'Inactive' }}
                                        </button>
                                    </td>
                                    <td>{{ $template->sort_order }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('business_card_templates.show', $template) }}" 
                                               class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('business_card_templates.edit', $template) }}" 
                                               class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('business_card_templates.duplicate', $template) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary btn-sm" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('business_card_templates.destroy', $template) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this template?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No templates found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Toggle active status
    $('.toggle-active-btn').click(function() {
        const templateId = $(this).data('id');
        const isActive = $(this).data('active');
        const button = $(this);
        
        $.ajax({
            url: `/admin/business_card_templates/${templateId}/toggle-active`,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    button.data('active', response.is_active);
                    if (response.is_active) {
                        button.removeClass('btn-secondary').addClass('btn-success').text('Active');
                    } else {
                        button.removeClass('btn-success').addClass('btn-secondary').text('Inactive');
                    }
                }
            },
            error: function() {
                alert('Error updating template status');
            }
        });
    });
});
</script>
@endpush
