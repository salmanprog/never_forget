@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('e_card_category.index') }}">
@include('admin.partials.outsource_category_index', [
    'createRoute' => 'e_card_category.create',
    'editRoute' => 'e_card_category.edit',
    'destroyPrefix' => 'e_card_category',
    'imageField' => 'image',
])
@endsection
