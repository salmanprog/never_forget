@extends('layouts.admin.app')
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
                @if (session('status'))
                    <div class="callout callout-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="box box-info">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Specify type</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th width="140">Action</th>
                                        <th>Contacts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($greetingsEnquiries as $enquiry)
                                        <tr>
                                            <td>{{ $enquiry->user_name }}</td>
                                            <td>{{ $enquiry->email }}</td>
                                            <td>{{ $enquiry->phone ?: 'No Phone' }}</td>
                                            <td>{{ $enquiry->specify_type ?: '—' }}</td>
                                            <td>{{ $enquiry->message ?: 'No message' }}</td>
                                            <td>{{ $enquiry->created_at->format('d M Y') }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('greetings_appreciation_enquiry.show', $enquiry->id) }}">view</a>
                                            </td>
                                            <td>
                                                <div class="btn-group mts-contacts-btn-group" role="group">
                                                    @if ($enquiry->phone)
                                                        <button type="button" class="btn btn-success btn-xs btn-open-message-modal"
                                                            title="Send Text"
                                                            data-name="{{ $enquiry->user_name }}"
                                                            data-last-name=""
                                                            data-phone="{{ $enquiry->phone }}">
                                                            <i class="fa fa-comment"></i>
                                                        </button>
                                                    @endif
                                                    @if ($enquiry->phone)
                                                        <button type="button" class="btn btn-primary btn-xs btn-initiate-call"
                                                            title="Make Call (Twilio)"
                                                            data-phone="{{ $enquiry->phone }}"
                                                            data-name="{{ $enquiry->user_name }}">
                                                            <i class="fa fa-phone"></i>
                                                        </button>
                                                    @endif
                                                    <button type="button" class="btn btn-info btn-xs btn-open-email-modal"
                                                        title="Send Email"
                                                        data-email="{{ $enquiry->email }}"
                                                        data-name="{{ $enquiry->user_name }}">
                                                        <i class="fa fa-envelope"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $greetingsEnquiries->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('includes.admin.mts-modals')
@endsection
@push('js')
    @include('includes.admin.mts-functions')
@endpush
