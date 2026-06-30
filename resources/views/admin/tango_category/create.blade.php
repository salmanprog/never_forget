@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
@include('admin.partials.outsource_category_form', [
    'formAction' => route('tango_category.store'),
    'backRoute' => 'tango_category.index',
    'defaultButtonText' => 'Create Tango',
    'previewImage' => asset('public/admin/assets/images/default.jpg'),
])
@endsection
