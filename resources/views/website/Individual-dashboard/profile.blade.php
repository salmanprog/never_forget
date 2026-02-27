@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
@endphp

@extends($layout)
@section('title', $page_title)
<style>
    .form-control {
        margin-bottom: 20px;
    }
</style>
@section('content')
    <section class="content-header">
        <div class="content-header-left">
            <h1>My Profile</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route('member.profile.edit') }}" class="btn btn-primary btn-sm">Edit Profile</a>
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm" style="margin-left: 10px;">Dashboard</a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="{{ $user->name ?? '' }}" style="background-color: #fff; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="{{ $user->last_name ?? '' }}" style="background-color: #fff; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="{{ $user->email ?? '' }}" style="background-color: #fff; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Phone Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="{{ $user->phone ?? '' }}" style="background-color: #fff; cursor: default;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
