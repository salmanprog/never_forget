@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left"><h1>{{ $page_title }}</h1></div>
    <div class="content-header-right">
        @include('includes.buttons.back')
        <a href="{{ route('custom_solution_service.index') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('custom_solution_service.update', $model->id) }}" class="form-horizontal" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                @include('admin.custom_solution_service._form', ['isEdit' => true])
            </form>
        </div>
    </div>
</section>
@endsection
