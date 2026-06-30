@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
@include('admin.partials.outsource_category_form', [
    'formAction' => route('tango_category.update', $model->id),
    'backRoute' => 'tango_category.index',
    'defaultButtonText' => 'Create Tango',
    'model' => $model,
    'previewImage' => $model->image ? asset('/public/' . $model->image) : asset('public/admin/assets/images/default.jpg'),
    'isEdit' => true,
])
@endsection
