@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('templates.index') }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back to Templates</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Phone Scripts</h3>
                </div>
                <div class="box-body">
                    <p class="text-muted">Phone call scripts and talking points will be managed here.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
@endpush
