@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('gusto_service.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('gusto_service.create') }}" class="btn btn-primary btn-sm">Add Service</a>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="callout callout-success">{{ session('message') }}</div>
            @endif
            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search services">
                        </div>
                        <div class="d-flex col-sm-6">
                            <select id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Options</th>
                                    <th>Sort</th>
                                    <th>Status</th>
                                    <th width="180">Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @include('admin.gusto_service.search')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
