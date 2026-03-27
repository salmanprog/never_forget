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
                        @php
                            $hasProductName = !empty($enquiries->product_name);
                        @endphp
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
                                    <th>Duration</th>
                                    <th>Destination</th>
                                    <th>Country</th>
                                    <th>Amenity</th>
                                    <th>Budget</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <tr>
                                    @if ($hasProductName)
                                        <td>{{ $enquiries->product_name }}</td>
                                    @endif
                                    <td>{{ $enquiries->name }}</td>
                                    <td>{{ $enquiries->email }}</td>
                                    <td>{{ $enquiries->phone }}</td>
                                    <td>{{ $enquiries->travel_type }}</td>
                                    <td>
                                        {{ getDurationName($enquiries->duration) }}
                                    </td>
                                    <td>
                                        {{ getDestinationName($enquiries->destination) }}
                                    </td>
                                    <td>
                                        {{ $enquiries->country == null ? 'N/A' : getCountryName($enquiries->country) }}
                                    </td>
                                    <td>
                                        {{ $enquiries->amenity == null ? 'N/A' : getAmenityName($enquiries->amenity) }}
                                    </td>
                                    <td>
                                        {{ $enquiries->budget == null ? 'N/A' : getBudgetName($enquiries->budget) }}
                                    </td>
                                    <td>{{ $enquiries->date }}</td>
                                    <td>{{ $enquiries->message }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
