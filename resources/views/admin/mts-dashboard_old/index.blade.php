@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('mts-dashboard.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
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
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search by name, email, or phone" value="{{ request('search') }}">
                            </div>
                            @if(Auth::user()->isAdmin())
                            <div class="d-flex col-sm-3">
                                <select name="account_type" id="account_type" class="form-control account_type" style="margin-bottom:5px" onchange="this.form.submit()">
                                    <option value="All" {{ request('account_type') == 'All' ? 'selected' : '' }}>All Types</option>
                                    <option value="Individual" {{ request('account_type') == 'Individual' ? 'selected' : '' }}>Individual</option>
                                    <option value="Company" {{ request('account_type') == 'Company' ? 'selected' : '' }}>Company</option>
                                </select>
                            </div>
                            @endif
                            <div class="d-flex col-sm-3">
                                <select name="status" id="status" class="form-control status" style="margin-bottom:5px" onchange="this.form.submit()">
                                    <option value="All" {{ request('status') == 'All' ? 'selected' : '' }}>All Status</option>
                                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>In-Active</option>
                                </select>
                            </div>
                             
                        </div>
                    </form>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date of Birth</th>
                                <th>Account Type</th>
                                <th>Company Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            @foreach($users as $key=>$user)
                                @if($user->hasRole('Admin'))
                                    @continue;
                                @endif
                                <tr id="id-{{ $user->id }}">
                                    <td>{{ $users->firstItem()+$key }}.</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->last_name ?? 'N/A' }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone ?? 'N/A' }}</td>
                                    <td>{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('M d, Y') : 'N/A' }}</td>
                                    <td>
                                        @if($user->account_type == 'Company')
                                            <span class="badge badge-company">
                                                Company
                                            </span>
                                        @else
                                            <span class="badge badge-individual">
                                                Individual
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $user->company_name ?? 'N/A' }}</td>
                                    <td>
                                        @if($user->status)
                                            <span class="badge label-success">Active</span>
                                        @else
                                            <span class="badge label-danger">In-Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            @if($user->phone)
                                                <!-- <button type="button" class="btn btn-success btn-xs" onclick="sendText('{{ $user->phone }}', '{{ $user->name }}')" title="Send Text">
                                                    <i class="fa fa-comment"></i>
                                                </button> -->
                                                <button type="button" class="btn btn-success btn-xs" onclick="openSendTextModal('{{ $user->phone }}', '{{ $user->name }}')" title="Send Text">
                                                    <i class="fa fa-comment"></i>
                                                </button>
                                            @endif
                                            @if($user->phone)
                                                <button type="button" class="btn btn-primary btn-xs" onclick="makeCall('{{ $user->phone }}', '{{ $user->name }}')" title="Make Call">
                                                    <i class="fa fa-phone"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-info btn-xs" onclick="sendEmail('{{ $user->email }}', '{{ $user->name }}')" title="Send Email">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="10">
                                    Displaying {{$users->firstItem()}} to {{$users->lastItem()}} of {{$users->total()}} records
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
</section>
<div class="modal fade" id="sendTextModal" tabindex="-1" role="dialog" aria-labelledby="sendTextModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sendTextModalLabel">Send Text</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="sendTextForm">
          <div class="form-group">
            <label for="recipientName">Name</label>
            <input type="text" class="form-control" id="recipientName" readonly>
          </div>
          <div class="form-group">
            <label for="recipientPhone">Phone</label>
            <input type="text" class="form-control" id="recipientPhone" readonly>
          </div>
          <div class="form-group">
            <label for="messageText">Message</label>
            <textarea class="form-control" id="messageText" rows="3" placeholder="Type your message"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="sendTextButton">Send Text</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
 function openSendTextModal(phone, name) {
    $('#recipientName').val(name);
    $('#recipientPhone').val(phone);
    $('#messageText').val('');
    $('#sendTextModal').modal('show');
}   
$('#sendTextButton').on('click', function () {
        const phone = $('#recipientPhone').val();
        const message = $('#messageText').val();

        if (!message.trim()) {
            alert('Please enter a message.');
            return;
        }

        $.ajax({
            url: "{{ route('send-text') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                phone: phone,
                message: message,
            },
            beforeSend: function () {
                $('#sendTextButton').prop('disabled', true).text('Sending...');
            },
            success: function (res) {
                if (res.status) {
                    alert(res.message);
                    $('#sendTextModal').modal('hide');
                } else {
                    alert(res.message || 'Failed to send.');
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Something went wrong.');
            },
            complete: function () {
                $('#sendTextButton').prop('disabled', false).text('Send Text');
            }
        });
    });
$(document).ready(function() {

// Action functions
function sendText(phone, name) {
    if (confirm('Send text message to ' + name + ' (' + phone + ')?')) {
        // Open SMS app on mobile devices or redirect to SMS service
        window.open('sms:' + phone, '_blank');
    }
}

function makeCall(phone, name) {
    if (confirm('Call ' + name + ' at ' + phone + '?')) {
        // Open phone app or redirect to calling service
        window.open('tel:' + phone, '_blank');
    }
}

function sendEmail(email, name) {
    if (confirm('Send email to ' + name + ' (' + email + ')?')) {
        // Open email client or redirect to email service
        window.open('mailto:' + email, '_blank');
    }
}
});
</script>
@endpush
