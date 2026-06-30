@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
@include('admin.partials.outsource_category_form', [
    'formAction' => route('balloons_category.store'),
    'backRoute' => 'balloons_category.index',
    'defaultButtonText' => null,
    'previewImage' => asset('public/admin/assets/images/default.jpg'),
])
@endsection
