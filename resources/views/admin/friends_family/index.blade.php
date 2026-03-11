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
@section('title', $page_title ?? 'All Friends/Family')
@section('content')
<input type="hidden" id="page_url" value="{{ route('member.friends_family.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>All Friends/Family</h1>
    </div>
    <div class="content-header-right">
        @include('includes.buttons.back')
        <a href="{{ route('member.friends_family.create') }}" class="btn btn-primary btn-sm">Add Friends/Family</a>
        <a href="{{ route('member.friends_family.bulk-upload') }}" class="btn btn-success btn-sm">Bulk Upload</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="callout callout-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="callout callout-warning">
                    {{ session('warning') }}
                </div>
            @endif
            @if (session('error'))
                <div class="callout callout-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('info'))
                <div class="callout callout-info">
                    {{ session('info') }}
                </div>
            @endif

            <div class="box box-info">
                <div class="box-body">
                    <form method="GET" action="{{ route('member.friends_family.index') }}" id="search-form">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by name, email, or phone" value="{{ request('search') }}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
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
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @forelse($records as $key => $row)
                                    <tr id="id-{{ $row->id }}">
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
                                        <td>{{ \Illuminate\Support\Str::limit($row->notes ?? '', 30) }}</td>
                                        <td>
                                            <a href="{{ route('member.friends_family.edit', $row->id) }}" class="btn btn-primary btn-xs">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button class="btn btn-danger btn-xs delete" data-id="{{ $row->id }}" data-del-url="{{ route('member.friends_family.destroy', $row->id) }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="24" class="text-center">No friends/family found.</td>
                                    </tr>
                                @endforelse
                                @if($records->count() > 0)
                                    <tr>
                                        <td colspan="24" style="padding: 15px; background: #f9f9f9;">
                                            <div style="margin-bottom: 10px;">Displaying {{ $records->firstItem() }} to {{ $records->lastItem() }} of {{ $records->total() }} records</div>
                                            <div class="text-center">
                                                {!! $records->appends(request()->query())->links('pagination::bootstrap-4') !!}
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
$(document).ready(function() {
    $('#search').on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            $(this).closest('form').submit();
        }
    });

    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        var url = $(this).data('del-url');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(response) {
                        $('#id-' + id).remove();
                        Swal.fire(
                            'Deleted!',
                            'Record has been deleted successfully.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'Something went wrong while deleting.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>
@endpush
