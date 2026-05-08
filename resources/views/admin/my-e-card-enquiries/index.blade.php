@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } else {
        $layout = 'layouts.individual.app';
    }
@endphp
@extends($layout)
@section('title', $page_title)
@section('content')
    <input type="hidden" id="page_url" value="{{ route('my-e-card-enquiries') }}">
    <section class="content-header">
        <div class="content-header-left">
            <h1>E-Card Enquiry</h1>
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
                        <div class="row" style="margin-bottom:10px">
                            <div class="d-flex col-sm-12">
                                <input type="text" id="search" class="form-control" placeholder="Search by Recipient, Occasion or Status">
                            </div>
                        </div>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Recipient</th>
                                    <th>E-Card category</th>
                                    <th>Occasion</th>
                                    <th>Send Date & Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($enquiries as $key => $enquiry)
                                    <tr>
                                        <td>{{ $enquiries->firstItem() + $key }}.</td>
                                        <td>{{ $enquiry->recipient_name }}<br><small>{{ $enquiry->recipient_email_phone }}</small></td>
                                        <td>{{ optional($enquiry->eCardCategory)->title ?? '—' }}</td>
                                        <td>{{ $enquiry->occasion }}</td>
                                        <td>{{ \Carbon\Carbon::parse($enquiry->send_date)->format('d M Y') }} {{ \Carbon\Carbon::parse($enquiry->send_time)->format('h:i A') }}</td>
                                        <td>
                                            @if($enquiry->status == 'New Request')
                                                <span class="badge label-info">New Request</span>
                                            @elseif($enquiry->status == 'Waiting for Design')
                                                <span class="badge label-warning">Waiting for Design</span>
                                            @elseif($enquiry->status == 'Awaiting Client Approval')
                                                <span class="badge label-primary">Awaiting Client Approval</span>
                                            @elseif($enquiry->status == 'Ready to Send')
                                                <span class="badge label-success">Ready to Send</span>
                                            @elseif($enquiry->status == 'Completed')
                                                <span class="badge label-success">Completed</span>
                                            @else
                                                <span class="badge label-default">{{ $enquiry->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6">
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
