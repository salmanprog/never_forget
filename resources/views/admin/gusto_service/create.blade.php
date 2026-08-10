@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left"><h1>{{ $page_title }}</h1></div>
    <div class="content-header-right">
        <a href="{{ route('gusto_service.index') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('gusto_service.store') }}" class="form-horizontal" method="post">
                @csrf
                @include('admin.gusto_service._form')
            </form>
        </div>
    </div>
</section>
@endsection
