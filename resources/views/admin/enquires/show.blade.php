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
                            $selectedServices = $enquiries->selected_services;
                            if (is_string($selectedServices)) {
                                $decoded = json_decode($selectedServices, true);
                                $selectedServices = is_array($decoded) ? $decoded : [];
                            }
                            $selectedServices = is_array($selectedServices) ? $selectedServices : [];
                            $isGusto = ($enquiries->identifier ?? '') === 'gusto';

                            $groupedServices = [];
                            foreach ($selectedServices as $item) {
                                $parts = explode('::', (string) $item, 2);
                                $category = trim($parts[0] ?? 'Other') ?: 'Other';
                                $option = trim($parts[1] ?? $item) ?: (string) $item;
                                $groupedServices[$category][] = $option;
                            }
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
                                    @if ($isGusto)
                                        <th>Selected Services</th>
                                    @else
                                        <th>Travel Type</th>
                                        <th>Any cruise line</th>
                                        <th>Duration</th>
                                        <th>Destination</th>
                                        <th>Country</th>
                                        <th>Amenity</th>
                                        <th>Budget</th>
                                        <th>Date</th>
                                    @endif
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
                                    @if ($isGusto)
                                        <td style="min-width:280px; vertical-align: top;">
                                            @if(count($groupedServices))
                                                @foreach($groupedServices as $category => $options)
                                                    <div style="margin-bottom:14px;">
                                                        <strong style="display:block; color:#0B1B48; margin-bottom:6px;">
                                                            {{ $category }}
                                                            <span style="font-weight:normal; color:#777;">({{ count($options) }})</span>
                                                        </strong>
                                                        <ul style="margin:0; padding-left:18px;">
                                                            @foreach($options as $option)
                                                                <li>{{ $option }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            @else
                                                —
                                            @endif
                                        </td>
                                    @else
                                        <td>{{ $enquiries->travel_type }}</td>
                                        <td>{{ $enquiries->any_cruise_line ? $enquiries->any_cruise_line : 'N/A' }}</td>
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
                                    @endif
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
