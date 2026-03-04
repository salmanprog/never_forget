@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } elseif (Auth::user()->hasRole('Sales Person')) {
        $layout = 'layouts.sales-person.app';
    } else {
        $layout = 'layouts.sales-person.app';
    }
@endphp
@extends($layout)
@section('title', $page_title)
@section('content')
    <input type="hidden" id="page_url" value="{{ route('mts-dashboard.index') }}">
    <section class="content-header">
        <div class="content-header-left">

            <h1>{{ $page_title }}</h1>
        </div>
        <div class="content-header-right">
            @include('includes.buttons.back')
        </div>
    </section>
    <style>
        .badge-company {
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #dc3545 !important;
            color: white !important;
        }

        .badge-individual {
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #ffc107 !important;
            color: black !important;
        }

        .badge-unknown {
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #6c757d !important;
            color: white !important;
        }

        .badge-salesperson {
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #28a745 !important;
            color: white !important;
        }

       
    </style>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="callout callout-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="box box-info">
                    <div class="box-body">
                        <form method="GET" action="{{ route('mts-dashboard.index') }}">
                            <div class="row" style="margin-bottom:10px">
                                <div class="d-flex col-sm-6">
                                    <input type="text" name="search" id="search" class="form-control"
                                        placeholder="Search by name, email, or phone" value="{{ request('search') }}">
                                </div>
                                @if (Auth::user()->isAdmin())
                                    <div class="d-flex col-sm-3">
                                        <select name="account_type" id="account_type" class="form-control account_type"
                                            style="margin-bottom:5px" onchange="this.form.submit()">
                                            <option value="All" {{ request('account_type') == 'All' ? 'selected' : '' }}>
                                                All Types</option>
                                            <option value="Individual"
                                                {{ request('account_type') == 'Individual' ? 'selected' : '' }}>Individual
                                            </option>
                                            <option value="Company"
                                                {{ request('account_type') == 'Company' ? 'selected' : '' }}>Company
                                            </option>
                                            <option value="Sales Person"
                                                {{ request('account_type') == 'Sales Person' ? 'selected' : '' }}>Sales
                                                Person</option>
                                        </select>
                                    </div>
                                @elseif(Auth::user()->hasRole('Sales Person'))
                                    <div class="d-flex col-sm-3">
                                        <select name="account_type" id="account_type" class="form-control account_type"
                                            style="margin-bottom:5px" onchange="this.form.submit()">
                                            <option value="All" {{ request('account_type') == 'All' ? 'selected' : '' }}>
                                                All Types</option>
                                            <option value="Individual"
                                                {{ request('account_type') == 'Individual' ? 'selected' : '' }}>Individual
                                            </option>
                                            <option value="Company"
                                                {{ request('account_type') == 'Company' ? 'selected' : '' }}>Company
                                            </option>
                                        </select>
                                    </div>
                                @endif
                                <div class="d-flex col-sm-3">
                                    <select name="status" id="status" class="form-control status"
                                        style="margin-bottom:5px" onchange="this.form.submit()">
                                        <option value="All" {{ request('status') == 'All' ? 'selected' : '' }}>All
                                            Status</option>
                                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>In-Active
                                        </option>
                                    </select>
                                </div>


                            </div>
                        </form>
                        <div class="table-responsive">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <!-- <th>Date of Birth</th> -->

                                        <th>Account Type</th>
                                        @if (Auth::user()->isAdmin())
                                            <th>Assigned To</th>
                                        @endif
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    @foreach ($users as $key => $user)
                                        @if ($user->hasRole('Admin'))
                                            @continue;
                                        @endif
                                        <tr id="id-{{ $user->id }}">
                                            <td>{{ $users->firstItem() + $key }}.</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->last_name ?? 'N/A' }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone ?? 'N/A' }}</td>
                                            <!-- <td>{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('M d, Y') : 'N/A' }}</td> -->
                                            <td>
                                                @if ($user->account_type == 'Company')
                                                    <span class="badge badge-company">
                                                        Company
                                                    </span>
                                                @elseif($user->account_type == 'Sales Person')
                                                    <span class="badge badge-salesperson">
                                                        Sales Person
                                                    </span>
                                                @else
                                                    <span class="badge badge-individual">
                                                        Individual
                                                    </span>
                                                @endif
                                            </td>

                                            @if (Auth::user()->isAdmin())
                                                <td>
                                                    <select class="form-control assigned-salesperson-select"
                                                        data-user-id="{{ $user->id }}" style="min-width: 150px;">
                                                        <option value="">-- Select Salesperson --</option>
                                                        @foreach ($salespersons as $salesperson)
                                                            <option value="{{ $salesperson->id }}"
                                                                {{ $user->assigned_to_user_id == $salesperson->id ? 'selected' : '' }}>
                                                                {{ $salesperson->name }}
                                                                {{ $salesperson->last_name ?? '' }}
                                                                ({{ $salesperson->email }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            @endif
                                            <td>
                                                @if ($user->status)
                                                    <span class="badge label-success">Active</span>
                                                @else
                                                    <span class="badge label-danger">In-Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group mts-contacts-btn-group" role="group">
                                                    @if ($user->phone)
                                                        <button type="button"
                                                            class="btn btn-success btn-xs btn-open-message-modal"
                                                            title="Send Text" data-name="{{ $user->name }}"
                                                            data-last-name="{{ $user->last_name ?? '' }}"
                                                            data-phone="{{ $user->phone }}">
                                                            <i class="fa fa-comment"></i>
                                                        </button>
                                                    @endif
                                                    @if ($user->phone)
                                                        <button type="button"
                                                            class="btn btn-primary btn-xs btn-initiate-call"
                                                            title="Make Call (Twilio)" data-phone="{{ $user->phone }}"
                                                            data-name="{{ $user->name }} {{ $user->last_name ?? '' }}">
                                                            <i class="fa fa-phone"></i>
                                                        </button>
                                                    @endif
                                                    <button type="button" class="btn btn-info btn-xs btn-open-email-modal"
                                                        title="Send Email" data-email="{{ $user->email }}"
                                                        data-name="{{ $user->name }} {{ $user->last_name ?? '' }}">
                                                        <i class="fa fa-envelope"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="{{ Auth::user()->isAdmin() ? '11' : '10' }}">
                                            Displaying {{ $users->firstItem() }} to {{ $users->lastItem() }} of
                                            {{ $users->total() }} records
                                            <div class="d-flex justify-content-center">
                                                {!! $users->links('pagination::bootstrap-4') !!}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    @include('includes.admin.mts-modals')
@endsection

@push('js')
    @include('includes.admin.mts-functions')
    <script>
        $(document).ready(function() {

            // Message modal: open and populate (store phone in data for send), then load conversation history


            // Handle salesperson assignment dropdown change
            $(document).on('change', '.assigned-salesperson-select', function() {
                var userId = $(this).data('user-id');
                var salespersonId = $(this).val();
                var selectElement = $(this);

                // Disable the select while updating
                selectElement.prop('disabled', true);

                var baseUrl = '{{ route('mts-dashboard.update-assigned-salesperson', ':id') }}';
                var url = baseUrl.replace(':id', userId);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        assigned_to_user_id: salespersonId
                    },
                    success: function(response) {
                        if (response.success) {
                            // Show success message with SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Salesperson assigned successfully',
                                confirmButtonColor: '#28a745',
                                timer: 3000,
                                timerProgressBar: true
                            });
                        }
                    },
                    error: function(xhr) {
                        // Show error message with SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error updating salesperson assignment. Please try again.',
                            confirmButtonColor: '#dc3545'
                        });
                        // Revert the selection
                        selectElement.val(selectElement.data('previous-value'));
                    },
                    complete: function() {
                        // Re-enable the select
                        selectElement.prop('disabled', false);
                    }
                });
            });

            // Store previous value before change
            $(document).on('focus', '.assigned-salesperson-select', function() {
                $(this).data('previous-value', $(this).val());
            });
        });
    </script>
@endpush
