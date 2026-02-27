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
@section('title', $page_title)
@section('content')
    <input type="hidden" id="page_url" value="{{ route('member.business-card-orders') }}">
    <section class="content-header">
        <div class="content-header-left">
            <h1>{{ $page_title }}</h1>
        </div>
        <div class="content-header-right">
            <input type="text" id="search" class="form-control" placeholder="Search by Order No#" style="max-width: 220px;">
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
                                        <th>SL</th>
                                        <th>Order No#</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    @include('website.individual-dashboard.business-card-orders-partials.table', ['models' => $models])
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
    $('#search').on('keyup', function(e) {
        if (e.which === 13) {
            var url = $('#page_url').val() + '?search=' + encodeURIComponent($(this).val());
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#body').html(data);
                }
            });
        }
    });
</script>
@endpush
