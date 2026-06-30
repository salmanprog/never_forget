@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('tango_category.index') }}">
@include('admin.partials.outsource_category_index', [
    'createRoute' => 'tango_category.create',
    'editRoute' => 'tango_category.edit',
    'destroyPrefix' => 'tango_category',
    'imageField' => 'image',
])
@endsection
