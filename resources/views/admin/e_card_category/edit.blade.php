@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
@include('admin.partials.outsource_category_form', [
    'formAction' => route('e_card_category.update', $model->id),
    'backRoute' => 'e_card_category.index',
    'defaultButtonText' => 'Create E Card',
    'model' => $model,
    'previewImage' => $model->image ? asset('/public/' . $model->image) : asset('public/admin/assets/images/default.jpg'),
    'isEdit' => true,
])
@endsection
