@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
    <section class="content-header">
        <div class="content-header-left">
            <h1>{{ $page_title }}</h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="callout callout-success">{{ session('success') }}</div>
                @endif
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Sender</th>
                                    <th>Recipient</th>
                                    <th>Occasion</th>
                                    <th>Send Date & Time</th>
                                    <th>Status</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach($enquiries as $key => $enquiry)
                                    <tr>
                                        <td>{{ $enquiries->firstItem() + $key }}</td>
                                        <td>{{ $enquiry->sender_name ?? 'N/A' }}<br><small>{{ $enquiry->sender_email ?? '' }}</small></td>
                                        <td>{{ $enquiry->recipient_name }}<br><small>{{ $enquiry->recipient_email_phone }}</small></td>
                                        <td>{{ $enquiry->occasion }}</td>
                                        <td>{{ \Carbon\Carbon::parse($enquiry->send_date)->format('d M Y') }} {{ \Carbon\Carbon::parse($enquiry->send_time)->format('h:i A') }}</td>
                                        <td>
                                            <select class="form-control ecard-status-select" data-id="{{ $enquiry->id }}" style="min-width: 180px;">
                                                <option value="New Request" {{ $enquiry->status == 'New Request' ? 'selected' : '' }}>New Request</option>
                                                <option value="Waiting for Design" {{ $enquiry->status == 'Waiting for Design' ? 'selected' : '' }}>Waiting for Design</option>
                                                <option value="Awaiting Client Approval" {{ $enquiry->status == 'Awaiting Client Approval' ? 'selected' : '' }}>Awaiting Client Approval</option>
                                                <option value="Ready to Send" {{ $enquiry->status == 'Ready to Send' ? 'selected' : '' }}>Ready to Send</option>
                                                <option value="Completed" {{ $enquiry->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{ route('e_card_enquiry.show', $enquiry->id) }}" class="btn btn-info btn-sm">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="7">
                                        Displaying {{ $enquiries->firstItem() }} to {{ $enquiries->lastItem() }} of {{ $enquiries->total() }} records
                                        <div class="d-flex justify-content-center">
                                            {!! $enquiries->links('pagination::bootstrap-4') !!}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script>
$(document).ready(function() {
    $(document).on('change', '.ecard-status-select', function() {
        var id = $(this).data('id');
        var status = $(this).val();
        var select = $(this);
        select.prop('disabled', true);
        $.ajax({
            url: '{{ url("e_card_enquiry") }}/' + id + '/update-status',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: status
            },
            success: function(res) {
                if (res.success) {
                    Swal.fire({ icon: 'success', title: 'Success', text: res.message, confirmButtonColor: '#081e37' });
                }
            },
            error: function() {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Failed to update status.', confirmButtonColor: '#dc3545' });
                select.val(select.data('prev'));
            },
            complete: function() {
                select.prop('disabled', false);
            }
        });
    });
    $(document).on('focus', '.ecard-status-select', function() {
        $(this).data('prev', $(this).val());
    });
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                $('#body').html(data);
            }
        });
    });
});
</script>
@endpush
