@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('balloons_category.index') }}">
@include('admin.partials.outsource_category_index', [
    'createRoute' => 'balloons_category.create',
    'editRoute' => 'balloons_category.edit',
    'destroyPrefix' => 'balloons_category',
    'imageField' => 'images',
])
@endsection
