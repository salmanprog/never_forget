<script>
    $(document).on('click', '.btn-open-message-modal', function() {
    var name = $(this).data('name') || '';
    var lastName = $(this).data('last-name') || '';
    var phone = $(this).data('phone') || '';
    var fullName = $.trim(name + ' ' + lastName) || 'N/A';
    $('#messageModalUserName').text(fullName);
    $('#messageModalUserPhone').text(phone);
    $('#messageModal').data('phone', phone);
    $('#messageModalText').val('');
    $('#messageModalHistory').html('<span class="text-muted">Loading...</span>');
    $('#messageModal').modal('show');
    // Fetch last 10 messages for this user
    $.get('<?php echo e(route("sms.conversation")); ?>', { phone: phone }, function(res) {
        var messages = res.messages || [];
        if (messages.length === 0) {
            $('#messageModalHistory').html('<span class="text-muted">No messages yet.</span>');
            return;
        }
        var html = '';
        messages.forEach(function(m) {
            var dir = m.direction === 'out' ? 'out' : 'in';
            var who = m.direction === 'out' ? 'You' : 'Them';
            html += '<div class="sms-msg sms-msg-' + dir + '">';
            html += '<div class="sms-msg-header">' + who + '<small>' + m.at + '</small></div>';
            html += '<div class="sms-msg-body">' + $('<div/>').text(m.text).html() + '</div>';
            html += '</div>';
        });
        $('#messageModalHistory').html(html);
    }).fail(function() {
        $('#messageModalHistory').html('<span class="text-muted">Could not load history.</span>');
    });
});

// Message modal: send via Twilio (AJAX to backend) — prevent any sms: link
$(document).on('click', '#messageModalSendBtn', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var phone = $('#messageModal').data('phone') || $('#messageModalUserPhone').text();
    var message = $('#messageModalText').val().trim();
    if (!phone) {
        Swal.fire({ icon: 'warning', title: 'No phone', text: 'No phone number to send to.', confirmButtonColor: '#081e37' });
        return;
    }
    if (!message) {
        Swal.fire({ icon: 'warning', title: 'Empty message', text: 'Please enter a message.', confirmButtonColor: '#081e37' });
        return;
    }
    var btn = $(this);
    btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Sending...');
    $.ajax({
        url: '<?php echo e(route("send-sms")); ?>',
        type: 'POST',
        data: {
            _token: '<?php echo e(csrf_token()); ?>',
            phone: phone,
            message: message
        },
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sent!',
                    text: response.message || 'Message sent successfully.',
                    confirmButtonColor: '#28a745',
                    timer: 3000,
                    timerProgressBar: true
                });
                $('#messageModal').modal('hide');
            } else {
                Swal.fire({ icon: 'error', title: 'Error', text: response.message || 'Failed to send.', confirmButtonColor: '#dc3545' });
            }
        },
        error: function(xhr) {
            var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Failed to send message. Please try again.';
            Swal.fire({ icon: 'error', title: 'Error', text: msg, confirmButtonColor: '#dc3545' });
        },
        complete: function() {
            btn.prop('disabled', false).html('<i class="fa fa-paper-plane"></i> Send');
        }
    });
});

// Twilio click-to-call: initiate call (you get called first, then connected to customer)
$(document).on('click', '.btn-initiate-call', function() {
    var phone = $(this).data('phone');
    var name = $.trim($(this).data('name')) || 'the customer';
    if (!phone) {
        Swal.fire({ icon: 'warning', title: 'No phone', text: 'No phone number to call.', confirmButtonColor: '#081e37' });
        return;
    }
    var btn = $(this);
    Swal.fire({
        icon: 'question',
        title: 'Call via Twilio',
        html: 'You will be called at your number first. When you answer, we\'ll connect you to <strong>' + $('<div/>').text(name).html() + '</strong> (' + $('<div/>').text(phone).html() + ').',
        showCancelButton: true,
        confirmButtonText: 'Initiate call',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#081e37'
    }).then(function(result) {
        if (!result.isConfirmed) return;
        btn.prop('disabled', true).find('i').removeClass('fa-phone').addClass('fa-spinner fa-spin');
        $.ajax({
            url: '<?php echo e(route("initiate-call")); ?>',
            type: 'POST',
            data: { _token: '<?php echo e(csrf_token()); ?>', phone: phone },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Calling you',
                        text: response.message,
                        confirmButtonColor: '#28a745',
                        timer: 5000,
                        timerProgressBar: true
                    });
                } else {
                    Swal.fire({ icon: 'error', title: 'Error', text: response.message || 'Failed to initiate call.', confirmButtonColor: '#dc3545' });
                }
            },
            error: function(xhr) {
                var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Failed to initiate call. Please try again.';
                Swal.fire({ icon: 'error', title: 'Error', text: msg, confirmButtonColor: '#dc3545' });
            },
            complete: function() {
                btn.prop('disabled', false).find('i').removeClass('fa-spinner fa-spin').addClass('fa-phone');
            }
        });
    });
});

function makeCall(phone, name) {
    $('.btn-initiate-call[data-phone="' + phone.replace(/"/g, '\\"') + '"]').first().trigger('click');
}

// Email compose modal: open and pre-fill To
$(document).on('click', '.btn-open-email-modal', function() {
    var email = $(this).data('email') || '';
    var name = $.trim($(this).data('name')) || '';
    $('#emailModalTo').val(name ? name + ' <' + email + '>' : email);
    $('#emailModal').data('to_email', email);
    $('#emailModal').data('to_name', name);
    $('#emailModalSubject').val('');
    $('#emailModalBody').val('');
    $('#emailModal').modal('show');
});
// Send email from modal (no Gmail redirect)
$(document).on('click', '#emailModalSendBtn', function() {
    var toEmail = $('#emailModal').data('to_email');
    var toName = $('#emailModal').data('to_name') || '';
    var subject = $('#emailModalSubject').val().trim();
    var body = $('#emailModalBody').val().trim();
    if (!toEmail) {
        Swal.fire({ icon: 'warning', title: 'No recipient', text: 'Recipient email is missing.', confirmButtonColor: '#081e37' });
        return;
    }
    if (!subject) {
        Swal.fire({ icon: 'warning', title: 'Subject required', text: 'Please enter a subject.', confirmButtonColor: '#081e37' });
        return;
    }
    if (!body) {
        Swal.fire({ icon: 'warning', title: 'Message required', text: 'Please enter your message.', confirmButtonColor: '#081e37' });
        return;
    }
    var btn = $(this);
    btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Sending...');
    $.ajax({
        url: '<?php echo e(route("mts-dashboard.send-email")); ?>',
        type: 'POST',
        data: {
            _token: '<?php echo e(csrf_token()); ?>',
            to_email: toEmail,
            to_name: toName,
            subject: subject,
            body: body
        },
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sent!',
                    text: response.message || 'Email sent successfully.',
                    confirmButtonColor: '#28a745',
                    timer: 3000,
                    timerProgressBar: true
                });
                $('#emailModal').modal('hide');
            } else {
                Swal.fire({ icon: 'error', title: 'Error', text: response.message || 'Failed to send.', confirmButtonColor: '#dc3545' });
            }
        },
        error: function(xhr) {
            var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Failed to send email. Please try again.';
            Swal.fire({ icon: 'error', title: 'Error', text: msg, confirmButtonColor: '#dc3545' });
        },
        complete: function() {
            btn.prop('disabled', false).html('<i class="fa fa-paper-plane"></i> Send');
        }
    });
});
</script><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\includes\admin\mts-functions.blade.php ENDPATH**/ ?>