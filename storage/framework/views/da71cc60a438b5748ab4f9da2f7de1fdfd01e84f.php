<style>
 /* Message modal - match admin theme (#081e37, #cfa40c) */
 #messageModal .modal-content {
            border: 1px solid #cfa40c;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(8, 30, 55, 0.3);
        }

        #messageModal .modal-header {
            background-color: #081e37;
            color: #fff;
            border-bottom: 2px solid #cfa40c;
            padding: 12px 15px;
            display: flex;
        }

        #messageModal .modal-title {
            color: #cfa40c !important;
            font-weight: 600;
        }

        #messageModal .modal-header .close {
            color: #fff;
            opacity: 0.9;
            text-shadow: none;
            margin-left: auto;
        }

        #messageModal .modal-header .close:hover {
            color: #cfa40c;
            opacity: 1;
        }

        #messageModal .modal-body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        #messageModal .modal-body label {
            color: #081e37;
            font-weight: 600;
        }

        #messageModal .modal-body .form-control-plaintext {
            color: #333;
            background: #fff;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 0;
        }

        #messageModal .modal-body .form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        #messageModal .modal-body .form-control:focus {
            border-color: #cfa40c;
            box-shadow: 0 0 0 0.2rem rgba(207, 164, 12, 0.25);
        }

        #messageModal .modal-footer {
            background-color: #fff;
            border-top: 2px solid #cfa40c;
            padding: 12px 15px;
        }

        #messageModal .modal-footer .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        #messageModal .modal-footer .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
            color: #fff;
        }

        #messageModal .modal-footer #messageModalSendBtn {
            background-color: #081e37;
            border-color: #cfa40c;
            color: #fff;
        }

        #messageModal .modal-footer #messageModalSendBtn:hover {
            background-color: #cfa40c;
            border-color: #cfa40c;
            color: #081e37;
        }

        /* Recent messages - chat-style blocks */
        #messageModalHistory {
            max-height: 200px;
            overflow-y: auto;
            font-size: 13px;
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 10px;
        }

        #messageModalHistory .sms-msg {
            margin-bottom: 12px;
            padding: 8px 10px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }

        #messageModalHistory .sms-msg:last-child {
            margin-bottom: 0;
        }

        #messageModalHistory .sms-msg-out {
            background: #e8f4fd;
            border-color: #b8daff;
            margin-left: 0;
            margin-right: 20%;
        }

        #messageModalHistory .sms-msg-in {
            background: #f0f7f0;
            border-color: #c3e6cb;
            margin-left: 20%;
            margin-right: 0;
        }

        #messageModalHistory .sms-msg-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4px;
            font-weight: 600;
            font-size: 12px;
        }

        #messageModalHistory .sms-msg-out .sms-msg-header {
            color: #0d6efd;
        }

        #messageModalHistory .sms-msg-in .sms-msg-header {
            color: #198754;
        }

        #messageModalHistory .sms-msg-header small {
            font-weight: normal;
            color: #6c757d;
            font-size: 11px;
        }

        #messageModalHistory .sms-msg-body {
            color: #333;
            line-height: 1.4;
            word-break: break-word;
        }

        /* Email compose modal - same theme as message modal */
        #emailModal .modal-content {
            border: 1px solid #cfa40c;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(8, 30, 55, 0.3);
        }

        #emailModal .modal-header {
            background-color: #081e37;
            color: #fff;
            border-bottom: 2px solid #cfa40c;
            padding: 12px 15px;
            display: flex;
        }

        #emailModal .modal-title {
            color: #cfa40c !important;
            font-weight: 600;
        }

        #emailModal .modal-header .close {
            color: #fff;
            opacity: 0.9;
            text-shadow: none;
            margin-left: auto;
        }

        #emailModal .modal-header .close:hover {
            color: #cfa40c;
            opacity: 1;
        }

        #emailModal .modal-body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        #emailModal .modal-body label {
            color: #081e37;
            font-weight: 600;
        }

        #emailModal .modal-body .form-control {
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        #emailModal .modal-body .form-control:focus {
            border-color: #cfa40c;
            box-shadow: 0 0 0 0.2rem rgba(207, 164, 12, 0.25);
        }

        #emailModal .modal-footer {
            background-color: #fff;
            border-top: 2px solid #cfa40c;
            padding: 12px 15px;
        }

        #emailModal .modal-footer .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        #emailModal .modal-footer #emailModalSendBtn {
            background-color: #081e37;
            border-color: #cfa40c;
            color: #fff;
        }

        #emailModal .modal-footer #emailModalSendBtn:hover {
            background-color: #cfa40c;
            border-color: #cfa40c;
            color: #081e37;
        }

</style>
<!-- Message Modal (Bootstrap modal, themed to match admin) -->

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel"><i class="fa fa-comment"></i> Send Message</h5>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Recent messages (last 10)</label>
                    <div id="messageModalHistory">
                        <span class="text-muted">Loading...</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="messageModalText">Message</label>
                    <textarea class="form-control" id="messageModalText" rows="4" placeholder="Type your message here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="messageModalSendBtn">
                    <span class="" style="margin-right: 5px;"><i class="fa fa-paper-plane"></i></span> Send
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Email Compose Modal (send from dashboard, no Gmail) -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel"><i class="fa fa-envelope"></i> Send Email</h5>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>To</label>
                    <input type="text" class="form-control" id="emailModalTo" readonly placeholder="Recipient email">
                </div>
                <div class="form-group">
                    <label for="emailModalSubject">Subject <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="emailModalSubject" placeholder="Email subject" maxlength="255">
                </div>
                <div class="form-group">
                    <label for="emailModalBody">Message <span style="color: red">*</span></label>
                    <textarea class="form-control" id="emailModalBody" rows="6" placeholder="Write your email here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info" id="emailModalSendBtn">
                    <i class="fa fa-paper-plane"></i> Send
                </button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\never-forget\resources\views/includes/admin/mts-modals.blade.php ENDPATH**/ ?>