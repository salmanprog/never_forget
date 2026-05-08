@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Sales Person')) {
        $layout = 'layouts.sales-person.app';
    } else {
        $layout = 'layouts.admin.app';
    }
@endphp
@extends($layout)
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
            <div class="box box-info">
                <div class="box-body">
                    @if($replies->isEmpty())
                        <p class="text-muted">No replies yet. When users reply to SMS sent from the MTS Dashboard, their messages will appear here.</p>
                    @else
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From (Phone)</th>
                                    <th>Message</th>
                                    <th>Received At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($replies as $key => $reply)
                                    <tr>
                                        <td>{{ $replies->firstItem() + $key }}</td>
                                        <td>{{ $reply->from_number }}</td>
                                        <td>{{ $reply->body }}</td>
                                        <td>{{ $reply->created_at->format('M d, Y h:i A') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {!! $replies->links('pagination::bootstrap-4') !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
