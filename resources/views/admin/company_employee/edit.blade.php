@extends('layouts.company.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Employee</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('company.employees.index') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="callout callout-danger">
                    <ul style="margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('company.employees.update', $employee->id) }}" id="employee-form" class="form-horizontal" method="post" accept-charset="utf-8">
                @csrf
                @method('PUT')

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name" class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('first_name', $employee->first_name) }}" name="first_name" id="first_name" placeholder="Enter first name">
                                <span style="color: red">{{ $errors->first('first_name') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="last_name" class="col-sm-2 control-label">Last Name <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('last_name', $employee->last_name) }}" name="last_name" id="last_name" placeholder="Enter last name">
                                <span style="color: red">{{ $errors->first('last_name') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" value="{{ old('email', $employee->email) }}" name="email" id="email" placeholder="Enter email address">
                                <span style="color: red">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('phone', $employee->phone) }}" name="phone" id="phone" placeholder="Enter phone number">
                                <span style="color: red">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Type <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <select name="type" id="type" class="form-control">
                                    <option value="" selected>Select type</option>
                                    <option value="employee" {{ old('type', $employee->type) == 'employee' ? 'selected' : '' }}>Employee</option>
                                    <option value="client" {{ old('type', $employee->type) == 'client' ? 'selected' : '' }}>Client</option>
                                </select>
                                <span style="color: red">{{ $errors->first('type') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-8">
                                <div class="form-control-static">
                                    @if($employee->is_active)
                                        <span class="badge label-success">Active</span>
                                    @else
                                        <span class="badge label-danger">Pending Invitation</span>
                                    @endif
                                </div>
                                <small class="help-block">
                                    @if(!$employee->is_active)
                                        Employee has not accepted the invitation yet.
                                        <a href="{{ route('company.employees.resend-invitation', $employee->id) }}" class="btn btn-warning btn-xs">
                                            <i class="fa fa-envelope"></i> Resend Invitation
                                        </a>
                                    @endif
                                </small>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Update Employee</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
$(document).ready(function() {
    $("#employee-form").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true
            },
            type: "required"
        },
        messages: {
            first_name: "Please enter first name",
            last_name: "Please enter last name",
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            type: "Please select employee type"
        }
    });
});
</script>
@endpush
