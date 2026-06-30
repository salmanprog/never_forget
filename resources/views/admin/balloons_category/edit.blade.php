@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
@include('admin.partials.outsource_category_form', [
    'formAction' => route('balloons_category.update', $model->id),
    'backRoute' => 'balloons_category.index',
    'defaultButtonText' => null,
    'model' => $model,
    'previewImage' => $model->images ? asset('/public/' . $model->images) : asset('public/admin/assets/images/default.jpg'),
    'isEdit' => true,
])
@endsection
