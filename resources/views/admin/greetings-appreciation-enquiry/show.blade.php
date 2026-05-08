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
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="5">Enquiry detail</th>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Specify type</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $greetingsEnquiry->user_name }}</td>
                                    <td>{{ $greetingsEnquiry->email }}</td>
                                    <td>{{ $greetingsEnquiry->phone }}</td>
                                    <td>{{ $greetingsEnquiry->specify_type ?: '—' }}</td>
                                    <td>{{ $greetingsEnquiry->message }}</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="5">Products</th>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($greetingsEnquiry->items as $item)
                                    <tr>
                                        <td>{{ $item->category->title ?? '' }}</td>
                                        <td>
                                            @if ($item->category && $item->category->image)
                                                <img src="{{ asset('/public/' . $item->category->image) }}"
                                                    alt=""
                                                    style="min-width: 100px; max-width: 100px; max-height: 100px">
                                            @endif
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td colspan="2"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
