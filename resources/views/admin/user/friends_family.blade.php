@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } else {
        $layout = 'layouts.company.app';
    }
@endphp

@extends($layout)
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        @include('includes.buttons.back')
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-sm-6">
                            <span class="badge label-info" style="font-size: 14px; padding: 8px 12px;">Friends/Family: {{ $records->total() }}</span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Recipient First Name</th>
                                    <th>Recipient Last Name</th>
                                    <th>Relationship with Client</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Occasion</th>
                                    <th>Occasion Date</th>
                                    <th>Gift Preferences</th>
                                    <th>Favorite Color</th>
                                    <th>Dietry Restrictions</th>
                                    <th>Budget</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>ZIP</th>
                                    <th>Delivery Date</th>
                                    <th>Delivery Note</th>
                                    <th>Message with gift</th>
                                    <th>Payment Method</th>
                                    <th>Tracking Number</th>
                                    <th>Delivery Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $key => $row)
                                    <tr>
                                        <td>{{ $records->firstItem() + $key }}.</td>
                                        <td>{{ $row->recipient_first_name }}</td>
                                        <td>{{ $row->recipient_last_name }}</td>
                                        <td>{{ $row->relationship_with_client ?? '—' }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone ?? '—' }}</td>
                                        <td>{{ $row->occasion ?? '—' }}</td>
                                        <td>{{ $row->occasion_date ? $row->occasion_date->format('M d, Y') : '—' }}</td>
                                        <td>{{ $row->gift_preferences ?? '—' }}</td>
                                        <td>{{ $row->favorite_color ?? '—' }}</td>
                                        <td>{{ $row->dietry_restrictions ?? '—' }}</td>
                                        <td>{{ $row->budget ?? '—' }}</td>
                                        <td>{{ $row->address ?? '—' }}</td>
                                        <td>{{ $row->city ?? '—' }}</td>
                                        <td>{{ $row->state ?? '—' }}</td>
                                        <td>{{ $row->zip ?? '—' }}</td>
                                        <td>{{ $row->delivery_date ? $row->delivery_date->format('M d, Y') : '—' }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($row->delivery_note ?? '', 30) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($row->message_with_gift ?? '', 30) }}</td>
                                        <td>{{ $row->payment_method ?? '—' }}</td>
                                        <td>{{ $row->tracking_number ?? '—' }}</td>
                                        <td>
                                            <select class="form-control input-sm delivery-status-select" data-id="{{ $row->id }}" data-user-id="{{ $user->id }}" style="min-width: 100px;">
                                                <option value="pending" {{ ($row->delivery_status ?? 'pending') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="shipped" {{ ($row->delivery_status ?? '') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                <option value="delivered" {{ ($row->delivery_status ?? '') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                <option value="cancelled" {{ ($row->delivery_status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($row->notes ?? '', 30) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="24" class="text-center">No friends/family found.</td>
                                    </tr>
                                @endforelse
                                @if($records->count() > 0)
                                    <tr>
                                        <td colspan="24">
                                            Displaying {{ $records->firstItem() }} to {{ $records->lastItem() }} of {{ $records->total() }} records
                                            <div class="d-flex justify-content-center">
                                                {!! $records->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
$(function() {
    $('.delivery-status-select').on('change', function() {
        var select = $(this);
        var userId = select.data('user-id');
        var id = select.data('id');
        var status = select.val();
        var url = '{{ url("user") }}/' + userId + '/friends-family/' + id + '/delivery-status';
        $.ajax({
            url: url,
            type: 'PATCH',
            data: { delivery_status: status, _token: '{{ csrf_token() }}' },
            success: function() {},
            error: function() { select.val(select.data('prev') || 'pending'); }
        });
        select.data('prev', status);
    });
});
</script>
@endpush
