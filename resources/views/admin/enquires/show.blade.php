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
                <div class="box box-info">
                    <div class="box-body">
                        @php
                            $hasProductName = !empty($enquiries->product_name);
                        @endphp
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    @if($hasProductName)
                                        <th>Product Name</th>
                                    @endif
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <tr>
                                    @if($hasProductName)
                                        <td>{{ $enquiries->product_name }}</td>
                                    @endif
                                    <td>{{ $enquiries->name }}</td>
                                    <td>{{ $enquiries->email }}</td>
                                    <td>{{ $enquiries->phone }}</td>
                                    <td>{{ $enquiries->message }}</td>
                                    <td>{{ $enquiries->created_at->format('d M Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
