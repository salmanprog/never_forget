@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
@endphp

@extends($layout)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>Friends/Family Gifting</h1>
    </div>
    <div class="content-header-right">
        @include('includes.buttons.back')
        <a href="{{ route('member.friends_family.index') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
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
                        @forelse($sentGifts as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
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
                                <td>{{ ucfirst($row->delivery_status ?? '—') }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($row->notes ?? '', 30) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="23" class="text-center">No sent gifts yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
@endpush
