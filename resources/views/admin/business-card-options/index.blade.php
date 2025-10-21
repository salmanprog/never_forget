@extends('layouts.admin.master')

@section('title', 'Business Card Options Management')

@section('content')
<div class="page-wrap">
    <div class="page-content">
        <div class="page-header">
            <h1 class="page-title">Business Card Options</h1>
            <div class="page-header-actions">
                <a href="{{ route('admin.business-card-options.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Add New Option
                </a>
            </div>
        </div>

        <div class="page-body">
            <div class="panel">
                <div class="panel-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        @if($options->count() > 0)
                            @foreach($options as $optionType => $optionGroup)
                                <div class="mb-4">
                                    <h4 class="section-title mb-3">
                                        {{ ucfirst(str_replace('_', ' ', $optionType)) }} Options
                                        <span class="badge badge-primary ml-2">{{ $optionGroup->count() }} options</span>
                                    </h4>

                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Name</th>
                                                <th>Option Key</th>
                                                <th>Price Modifier</th>
                                                <th>Sort Order</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($optionGroup->sortBy('sort_order') as $option)
                                                <tr>
                                                    <td>
                                                        <strong>{{ $option->name }}</strong>
                                                        @if($option->description)
                                                            <br><small class="text-muted">{{ $option->description }}</small>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <code>{{ $option->option_key }}</code>
                                                    </td>
                                                    <td>
                                                        @if($option->price_modifier > 0)
                                                            <span class="text-success">+${{ number_format($option->price_modifier, 2) }}</span>
                                                        @elseif($option->price_modifier < 0)
                                                            <span class="text-danger">${{ number_format($option->price_modifier, 2) }}</span>
                                                        @else
                                                            <span class="text-muted">$0.00</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $option->sort_order }}</td>
                                                    <td>
                                                        <label class="toggle-label">
                                                            <input type="checkbox" 
                                                                   class="toggle-status" 
                                                                   data-id="{{ $option->id }}"
                                                                   {{ $option->is_active ? 'checked' : '' }}>
                                                            <span class="toggle-slider"></span>
                                                            <span class="toggle-text">{{ $option->is_active ? 'Active' : 'Inactive' }}</span>
                                                        </label>
                                                    </td>
                                                    <td class="text-center">
                                                        <!-- View Button -->
                                                        <a href="{{ route('admin.business-card-options.show', $option) }}" 
                                                           class="btn btn-info btn-sm" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <!-- Edit Button -->
                                                        <a href="{{ route('admin.business-card-options.edit', $option) }}" 
                                                           class="btn btn-primary btn-sm" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        
                                                        <!-- Delete Button -->
                                                        <form method="POST" 
                                                              action="{{ route('admin.business-card-options.destroy', $option) }}" 
                                                              style="display: inline-block;"
                                                              onsubmit="return confirm('Are you sure you want to delete this option?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-5">
                                <div class="empty-state">
                                    <div class="empty-icon">
                                        <i class="fa fa-cog"></i>
                                    </div>
                                    <h4>No Options Found</h4>
                                    <p class="text-muted">Start by creating your first business card option.</p>
                                    <a href="{{ route('admin.business-card-options.create') }}" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Add New Option
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toggle Status Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-status').forEach(function(toggle) {
        toggle.addEventListener('change', function() {
            const optionId = this.dataset.id;
            const isActive = this.checked;

            fetch(`/admin/business-card-options/${optionId}/toggle-active`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const label = toggle.parentElement.querySelector('.toggle-text');
                    label.textContent = data.is_active ? 'Active' : 'Inactive';
                    
                    // Show success message
                    showToast('success', data.message);
                } else {
                    // Revert toggle state
                    toggle.checked = !isActive;
                    showToast('error', 'Failed to update option status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toggle.checked = !isActive;
                showToast('error', 'Failed to update option status');
            });
        });
    });
});

function showToast(type, message) {
    // Simple toast notification
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        background: ${type === 'success' ? '#28a745' : '#dc3545'};
        color: white;
        border-radius: 4px;
        z-index: 9999;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.3s ease;
    `;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    // Show animation
    setTimeout(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateX(0)';
    }, 100);
    
    // Hide after 3 seconds
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}
</script>
@endsection

@push('styles')
<style>
    .section-title {
        color: #333;
        padding-bottom: 10px;
        border-bottom: 2px solid #007bff;
    }

    .toggle-label {
        display: flex;
        align-items: center;
        margin-bottom: 0;
        cursor: pointer;
    }

    .toggle-status {
        margin-right: 8px;
    }

    .toggle-slider {
        width: 44px;
        height: 22px;
        background-color: #ccc;
        border-radius: 11px;
        position: relative;
        margin-right: 8px;
        transition: background-color 0.3s;
    }

    .toggle-slider:before {
        content: '';
        position: absolute;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background-color: white;
        top: 2px;
        left: 2px;
        transition: transform 0.3s;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }

    .toggle-status:checked + .toggle-slider {
        background-color: #28a845;
    }

    .toggle-status:checked + .toggle-slider:before {
        transform: translateX(22px);
    }

    .toggle-text {
        font-size: 14px;
        color: #6c757d;
    }

    .toggle-status:checked + .toggle-slider + .toggle-text {
        color: #28a845;
        font-weight: 500;
    }

    code {
        background-color: #f8f9fa;
        color: #e83e8c;
        padding: 2px 4px;
        border-radius: 3px;
        font-size: 12px;
    }

    .empty-state {
        padding: 40px;
    }

    .empty-icon {
        font-size: 48px;
        color: #dee2e6;
        margin-bottom: 20px;
    }

    .table-responsive {
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 14px;
        }
        
        .btn-sm {
            padding: 5px 8px;
            font-size: 12px;
        }
    }
</style>
@endpush
