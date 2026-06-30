@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
@include('admin.partials.outsource_category_form', [
    'formAction' => route('perfect_gift_category.update', $model->id),
    'backRoute' => 'perfect_gift_category.index',
    'defaultButtonText' => null,
    'model' => $model,
    'previewImage' => $model->images ? asset('/public/' . $model->images) : asset('public/admin/assets/images/default.jpg'),
    'isEdit' => true,
])
@endsection
