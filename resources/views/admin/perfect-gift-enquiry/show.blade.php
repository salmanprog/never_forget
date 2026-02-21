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
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <tr>
                                    <td>{{ $perfectGiftEnquiry->user_name }}</td>
                                    <td>{{ $perfectGiftEnquiry->email }}</td>
                                    <td>{{ $perfectGiftEnquiry->phone }}</td>
                                    <td>{{ $perfectGiftEnquiry->message }}</td>
                                    <td>{{ $perfectGiftEnquiry->created_at->format('d M Y') }}</td>
                                </tr>
                            </tbody>
                            {{-- <thead>
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
                                @foreach ($perfectGiftEnquiry->items as $item)
                                <tr>
                                    <td>{{ $item->perfectGift->title }}</td>
                                    <td>
                                        <img src="{{ asset('/public/' . $item->perfectGift->images) }}"
                                             alt="{{ $item->perfectGift->title }}"
                                             style="min-width: 100px; max-width: 100px; max-height: 100px">
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
