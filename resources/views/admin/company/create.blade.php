@extends('layouts.company.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>Create Company</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.company_employee.index') }}" class="btn btn-primary btn-sm">Back to Employees</a>
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

            @if (session('info'))
                <div class="callout callout-info">
                    {{ session('info') }}
                </div>
            @endif

            <form action="{{ route('admin.company.store') }}" id="company-form" class="form-horizontal" method="post" accept-charset="utf-8">
                @csrf

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Company Name <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="Enter company name">
                                <span style="color: red">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="website" class="col-sm-2 control-label">Website</label>
                            <div class="col-sm-8">
                                <input type="url" class="form-control" value="{{ old('website') }}" name="website" id="website" placeholder="https://example.com">
                                <span style="color: red">{{ $errors->first('website') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter company address">{{ old('address') }}</textarea>
                                <span style="color: red">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="industry" class="col-sm-2 control-label">Industry</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('industry') }}" name="industry" id="industry" placeholder="Enter industry">
                                <span style="color: red">{{ $errors->first('industry') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="billing_email" class="col-sm-2 control-label">Billing Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" value="{{ old('billing_email') }}" name="billing_email" id="billing_email" placeholder="Enter billing email">
                                <span style="color: red">{{ $errors->first('billing_email') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="billing_phone" class="col-sm-2 control-label">Billing Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('billing_phone') }}" name="billing_phone" id="billing_phone" placeholder="Enter billing phone">
                                <span style="color: red">{{ $errors->first('billing_phone') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="plan" class="col-sm-2 control-label">Plan <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <select name="plan" id="plan" class="form-control">
                                    <option value="Basic" {{ old('plan') == 'Basic' ? 'selected' : '' }}>Basic</option>
                                    <option value="Standard" {{ old('plan') == 'Standard' ? 'selected' : '' }}>Standard</option>
                                    <option value="Enterprise" {{ old('plan') == 'Enterprise' ? 'selected' : '' }}>Enterprise</option>
                                </select>
                                <span style="color: red">{{ $errors->first('plan') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="options" class="col-sm-2 control-label">Options <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <select name="options" id="options" class="form-control">
                                    <option value="Clientele" {{ old('options') == 'Clientele' ? 'selected' : '' }}>Clientele</option>
                                    <option value="Employees" {{ old('options') == 'Employees' ? 'selected' : '' }}>Employees</option>
                                    <option value="Both" {{ old('options') == 'Both' || old('options') == '' ? 'selected' : '' }}>Both</option>
                                </select>
                                <span style="color: red">{{ $errors->first('options') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter company description">{{ old('description') }}</textarea>
                                <span style="color: red">{{ $errors->first('description') }}</span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Create Company</button>
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
    $("#company-form").validate({
        rules: {
            name: "required",
            plan: "required",
            options: "required"
        },
        messages: {
            name: "Please enter company name",
            plan: "Please select a plan",
            options: "Please select an option"
        }
    });
});
</script>
@endpush

