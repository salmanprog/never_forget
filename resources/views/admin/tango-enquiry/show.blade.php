@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
    <section class="content-header">
        <div class="content-header-left"><h1>{{ $page_title }}</h1></div>
        <div class="content-header-right">@include('includes.buttons.back')</div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <tr><th colspan="2">Tango Enquiry Detail</th></tr>
                            <tr><th width="200">Status</th><td><strong>{{ $enquiry->status }}</strong></td></tr>
                            <tr><th>Tango Category</th><td>{{ optional($enquiry->tangoCategory)->title ?? '—' }}</td></tr>
                            <tr><th>Occasion</th><td>{{ $enquiry->occasion }}</td></tr>
                            <tr><th>Recipient Name</th><td>{{ $enquiry->recipient_name }}</td></tr>
                            <tr><th>Recipient Email / Phone</th><td>{{ $enquiry->recipient_email_phone }}</td></tr>
                            <tr><th>Message</th><td>{{ $enquiry->message ?? '—' }}</td></tr>
                            <tr><th>Preferred Card Style</th><td>{{ $enquiry->card_style ?? '—' }}</td></tr>
                            @if($enquiry->upload_logo_photo)
                            <tr><th>Uploaded Logo / Photo</th><td><img src="{{ asset('/public/' . $enquiry->upload_logo_photo) }}" alt="Upload" style="max-width: 200px; max-height: 150px;"></td></tr>
                            @endif
                            <tr><th>Send Date</th><td>{{ \Carbon\Carbon::parse($enquiry->send_date)->format('d M Y') }}</td></tr>
                            <tr><th>Send Time</th><td>{{ \Carbon\Carbon::parse($enquiry->send_time)->format('h:i A') }}</td></tr>
                            <tr><th>Add Physical Gift?</th><td>{{ $enquiry->physical_gift }}</td></tr>
                            @if($enquiry->physical_gift == 'Yes')
                            <tr><th>Physical Gift Type</th><td>{{ $enquiry->physical_gift_type ?? '—' }}</td></tr>
                            @endif
                            <tr><th>Sender Name</th><td>{{ $enquiry->sender_name ?? '—' }}</td></tr>
                            <tr><th>Sender Email</th><td>{{ $enquiry->sender_email ?? '—' }}</td></tr>
                            <tr><th>Sender Phone</th><td>{{ $enquiry->sender_phone ?? '—' }}</td></tr>
                            <tr><th>Company Name</th><td>{{ $enquiry->company_name ?? '—' }}</td></tr>
                            <tr><th>Submitted At</th><td>{{ $enquiry->created_at->format('d M Y h:i A') }}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
