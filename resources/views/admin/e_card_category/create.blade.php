@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
@include('admin.partials.outsource_category_form', [
    'formAction' => route('e_card_category.store'),
    'backRoute' => 'e_card_category.index',
    'defaultButtonText' => 'Create E Card',
    'previewImage' => asset('public/admin/assets/images/default.jpg'),
])
@endsection
