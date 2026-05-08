{{-- Theme-consistent alert when limit exceeded (after add or bulk upload) --}}
@if (session('upgrade_required') && session('upgrade_url'))
    <div class="callout callout-warning">
        <h4><i class="icon fa fa-exclamation-triangle"></i> Limit reached</h4>
        <p class="mb-2">You have reached your default limit of 10 employees and 5 clients. To add more, please upgrade your package. To upgrade, go to your dashboard settings.</p>
        <p class="mb-0">
            <a href="{{ session('upgrade_url') }}" class="btn btn-primary">
                <i class="fa fa-arrow-up"></i> Upgrade Package
            </a>
        </p>
    </div>
@endif

{{-- At-limit warning on form pages (Add Resource / Bulk Upload) --}}
@if (isset($employeeCount) && isset($clientCount) && isset($limits))
    @php
        $employeesAtLimit = $employeeCount >= $limits['employees'];
        $clientsAtLimit = $clientCount >= $limits['clients'];
    @endphp
    @if ($employeesAtLimit || $clientsAtLimit)
        <div class="callout callout-info">
            <h4><i class="icon fa fa-info-circle"></i> Resource limits</h4>
            <p class="mb-2">You have reached your default limit of {{ $limits['employees'] }} employees and {{ $limits['clients'] }} clients. To add more, please upgrade your package. To upgrade, go to your dashboard settings.</p>
            <p class="mb-0">
                <a href="{{ route('company.package-upgrade') }}" class="btn btn-success">
                    <i class="fa fa-arrow-up"></i> Upgrade Package
                </a>
            </p>
        </div>
    @endif
@endif
