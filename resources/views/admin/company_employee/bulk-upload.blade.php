@extends('layouts.company.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>Bulk Upload Employees</h1>
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

            <div class="box box-info">
                <div class="box-body">
                    <div class="alert alert-info">
                        <h4><i class="icon fa fa-info"></i> Instructions:</h4>
                        <ul>
                            <li>Download the CSV template below to see the correct format</li>
                            <li>Fill in the employee data following the template format</li>
                            <li>Upload the CSV file (maximum 2MB)</li>
                            <li>Required fields: First Name, Last Name, Email, Type</li>
                            <li>Type should be either "employee" or "client"</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Download Template</h4>
                            <a href="{{ route('company.employees.download-template') }}" class="btn btn-success">
                                <i class="fa fa-download"></i> Download CSV Template
                            </a>
                        </div>
                    </div>

                    <hr>

                    <form action="{{ route('company.employees.process-bulk-upload') }}" id="bulk-upload-form" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        @csrf

                        <div class="form-group">
                            <label for="csv_file" class="col-sm-2 control-label">CSV File <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="csv_file" id="csv_file" accept=".csv,.txt">
                                <span style="color: red">{{ $errors->first('csv_file') }}</span>
                                <small class="help-block">Select a CSV file with employee data (max 2MB)</small>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">
                                    <i class="fa fa-upload"></i> Upload Employees
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sample CSV Format -->
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">Sample CSV Format</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john.doe@example.com</td>
                                    <td>+1234567890</td>
                                    <td>employee</td>
                                </tr>
                                <tr>
                                    <td>Jane</td>
                                    <td>Smith</td>
                                    <td>jane.smith@example.com</td>
                                    <td>+1234567891</td>
                                    <td>client</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
<script>
$(document).ready(function() {
    $("#bulk-upload-form").validate({
        rules: {
            csv_file: {
                required: true,
                extension: "csv|txt"
            }
        },
        messages: {
            csv_file: {
                required: "Please select a CSV file",
                extension: "Please select a valid CSV file"
            }
        }
    });

    // File size validation
    $('#csv_file').change(function() {
        var file = this.files[0];
        if (file && file.size > 2 * 1024 * 1024) { // 2MB
            alert('File size must be less than 2MB');
            $(this).val('');
        }
    });
});
</script>
@endpush
