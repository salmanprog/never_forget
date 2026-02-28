@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
@endphp

@extends($layout)
@section('title', $page_title)
@section('content')
    <input type="hidden" id="page_url" value="{{ $page_url ?? route('member.balloon-enquiries') }}">
    <section class="content-header">
        <div class="content-header-left">
            <h1>{{ $page_title }}</h1>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th width="100">Details</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    @include('website.individual-dashboard.balloon-enquiries-partials.table', ['balloonEnquiries' => $balloonEnquiries])
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
    $(document).on('click', '.btn-toggle-enquiry-detail', function() {
        var target = $(this).data('target');
        var $row = $('#' + target);
        var expanded = $row.is(':visible');
        $row.toggle();
        $(this).attr('aria-expanded', !expanded).html(expanded ? '<i class="fa fa-chevron-down"></i> View details' : '<i class="fa fa-chevron-up"></i> Hide details');
    });
</script>
@endpush
