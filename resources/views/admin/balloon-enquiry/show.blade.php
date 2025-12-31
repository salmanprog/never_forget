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
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Enquiry Detail</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <tr>
                                    <td>{{ $balloonEnquiry->user_name }}</td>
                                    <td>{{ $balloonEnquiry->email }}</td>
                                    <td>{{ $balloonEnquiry->phone }}</td>
                                    <td>{{ $balloonEnquiry->message }}</td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th>Products</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>title</th>
                                    <th>image</th>
                                    <th>quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($balloonEnquiry->items as $item)
                                <tr>
                                    <td>{{ $item->balloon->title }}</td>
                                    <td>
                                        <img src="{{ asset('/public/' . $item->balloon->images) }}"
                                             alt="{{ $item->balloon->title }}"
                                             style="min-width: 100px; max-width: 100px; max-height: 100px">
                                    </td>
                                    <td>{{ $item->quantity }}</td>
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
