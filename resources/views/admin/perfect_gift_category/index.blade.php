@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('perfect_gift_category.index') }}">
@include('admin.partials.outsource_category_index', [
    'createRoute' => 'perfect_gift_category.create',
    'editRoute' => 'perfect_gift_category.edit',
    'destroyPrefix' => 'perfect_gift_category',
    'imageField' => 'images',
    'showButtonText' => false,
])
@endsection
