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
                @php
                    $hasProductName = $enquiries->contains(function ($item) {
                        return !empty($item->product_name);
                    });
                @endphp
                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            {{-- <div class="d-flex col-sm-4">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div> --}}
                            {{-- <div class="d-flex col-sm-4">
                                <select name="" id="type" class="form-control type" style="margin-bottom:5px">
                                    <option value="All" selected>Search by type</option>
                                    <option value="custom_quote">Custom Quote</option>
                                    <option value="request_a_quote">Request a Quote</option>
                                </select>
                            </div> --}}
                            {{-- <div class="d-flex col-sm-4">
                                <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                    <option value="All" selected>Search by status</option>
                                    <option value="1">Active</option>
                                    <option value="2">In-Active</option>
                                </select>
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        @if ($hasProductName)
                                            <th>Product Name</th>
                                        @endif
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Travel Type</th>
                                        <th>Date</th>
                                        <th>Message</th>
                                        <th width="140">Action</th>
                                        <th>Contacts</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    @foreach ($enquiries as $enquiry)
                                        <tr>
                                            @if ($hasProductName)
                                                <td>
                                                    {{ $enquiry->product_name ?? 'No Product' }}
                                                </td>
                                            @endif
                                            <td>{{ $enquiry->name }}</td>
                                            <td>{{ $enquiry->email }}</td>
                                            <td>
                                                @if (!$enquiry->phone)
                                                    No Phone
                                                @endif
                                                {{ $enquiry->phone }}
                                            </td>
                                            <td>
                                                {{ $enquiry->travel_type }}
                                            </td>
                                            <td>{{ $enquiry->date }}</td>
                                            <td>
                                                @if (!$enquiry->message)
                                                    <span>No message</span>
                                                @endif
                                                {{ $enquiry->message }}
                                            </td>
                                            {{-- <td>{{ $enquiry->created_at->format('d M Y') }}</td> --}}
                                            <td>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('enquires-detail.show', $enquiry->id) }}">view</a>
                                            </td>
                                            <td>
                                                <div class="btn-group mts-contacts-btn-group" role="group">
                                                    @if ($enquiry->phone)
                                                        <button type="button"
                                                            class="btn btn-success btn-xs btn-open-message-modal"
                                                            title="Send Text" data-name="{{ $enquiry->name }}"
                                                            data-last-name="{{ $enquiry->last_name ?? '' }}"
                                                            data-phone="{{ $enquiry->phone }}">
                                                            <i class="fa fa-comment"></i>
                                                        </button>
                                                    @endif
                                                    @if ($enquiry->phone)
                                                        <button type="button"
                                                            class="btn btn-primary btn-xs btn-initiate-call"
                                                            title="Make Call (Twilio)" data-phone="{{ $enquiry->phone }}"
                                                            data-name="{{ $enquiry->name }} {{ $enquiry->last_name ?? '' }}">
                                                            <i class="fa fa-phone"></i>
                                                        </button>
                                                    @endif
                                                    <button type="button" class="btn btn-info btn-xs btn-open-email-modal"
                                                        title="Send Email" data-email="{{ $enquiry->email }}"
                                                        data-name="{{ $enquiry->name }} {{ $enquiry->last_name ?? '' }}">
                                                        <i class="fa fa-envelope"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="11">
                                            {{-- Displying {{ $models->firstItem() }} to {{ $models->lastItem() }} of
                                        {{ $models->total() }} records
                                        <div class="d-flex justify-content-center">
                                            {!! $models->links('pagination::bootstrap-4') !!}
                                        </div> --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            Displaying {{ $enquiries->firstItem() }}
                                            to {{ $enquiries->lastItem() }}
                                            of {{ $enquiries->total() }} records

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
        </div>
    </section>
    @include('includes.admin.mts-modals')
@endsection

@push('js')
    @include('includes.admin.mts-functions')
    <script>
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    $('#body').html(data);
                },
                error: function() {
                    console.log('Something went wrong');
                }
            });
        });
    </script>
@endpush
