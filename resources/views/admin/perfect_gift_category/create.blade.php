@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
@include('admin.partials.outsource_category_form', [
    'formAction' => route('perfect_gift_category.store'),
    'backRoute' => 'perfect_gift_category.index',
    'defaultButtonText' => null,
    'previewImage' => asset('public/admin/assets/images/default.jpg'),
])
@endsection
