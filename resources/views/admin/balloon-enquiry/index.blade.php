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
                @if (session('status'))
                    <div class="callout callout-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            <div class="d-flex col-sm-4">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
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
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    {{-- <th>Quantity</th> --}}
                                    <th>Message</th>
                                    <th width="140">Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach($balloonEnquiries as $enquiry)
                                    <tr>
                                        <td>{{$enquiry->user_name}}</td>
                                        <td>{{$enquiry->email}}</td>
                                        <td>
                                            @if (!$enquiry->phone)
                                              No Phone
                                            @endif
                                            {{$enquiry->phone}}
                                        </td>
                                        <td>
                                            @if (!$enquiry->message)
                                                <span>No message</span>
                                            @endif
                                            {{$enquiry->message}}
                                        </td>
                                        {{-- @foreach ($enquiry->Items as $item )
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->balloon->title}}</td>
                                        <td><img src="{{ asset('/public/' . $item->balloon->images) }}" alt="{{$item->balloon->title}}"
                                            style="min-width: 100px; max-width: 100px; max-height: 100px"
                                            ></td>
                                        @endforeach --}}
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{route('balloon_enquiry.show', $enquiry->id)}}">view</a>
                                        </td>
                                        <td></td>
                                        <td>
                                            {{-- @if ($model->status)
                                                <span class="badge label-success">Active</span>
                                            @else
                                                <span class="badge label-danger">In-Active</span>
                                            @endif --}}
                                        </td>
                                        <td width="250px">
                                            {{-- <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}"
                                                data-del-url="{{ url('contactus', $model->id) }}"><i
                                                    class="fa fa-trash"></i> Delete</button> --}}
                                            
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
                                        Displaying {{ $balloonEnquiries->firstItem() }}
                                        to {{ $balloonEnquiries->lastItem() }}
                                        of {{ $balloonEnquiries->total() }} records
                                
                                        <div class="d-flex justify-content-center">
                                            {!! $balloonEnquiries->links('pagination::bootstrap-4') !!}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
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
