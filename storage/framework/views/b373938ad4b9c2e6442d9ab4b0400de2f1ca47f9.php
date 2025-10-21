<!-- Quote Modal -->
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quoteModalLabel">Get A Quote</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('contactus.store')); ?>" id="quoteForm" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="quote_form" value="1">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="quote_first_name" class="label-field">First Name</label>
                                <input class="input-field" type="text" name="first_name" id="quote_first_name"
                                    placeholder="Enter Your First Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="quote_last_name" class="label-field">Last Name</label>
                                <input class="input-field" type="text" name="last_name" id="quote_last_name"
                                    placeholder="Enter Your Last Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="quote_email" class="label-field">Email Address</label>
                                <input class="input-field" type="email" name="email" id="quote_email"
                                    placeholder="Enter Your Email" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="quote_phone" class="label-field">Phone Number</label>
                                <input class="input-field" type="text" name="phone" id="quote_phone"
                                    placeholder="Enter Your Phone Number" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="field-wrapper">
                                <label for="quote_company" class="label-field">Company Name</label>
                                <input class="input-field" type="text" name="company" id="quote_company"
                                    placeholder="Enter Your Company Name" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="field-wrapper">
                                <label for="quote_plans" class="label-field">Choose Your Gifting Plan</label>
                                <select name="plans" id="quote_plans" class="input-field form-select" required>
                                    <option value="" selected>Choose Your Plan</option>
                                    <option value="Basic Plan">Basic Plan</option>
                                    <option value="Standard Plan">Standard Plan</option>
                                    <option value="Enterprise Plan">Enterprise Plan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="field-wrapper">
                                <label for="quanitity" class="label-field">Choose Your Options</label>
                                <select name="quanitity" id="quanitity" class="input-field form-select">
                                    <option value="" selected>Choose Your Options</option>
                                    <option value="Clientele">Clientele</option>
                                    <option value="Clientele & Employees">Clientele & Employees</option>
                                    <option value="Employees">Employees</option> 
                                </select> 
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="field-wrapper">
                                <label for="quote_message" class="label-field">Additional Message</label>
                                <textarea class="input-field text-area" name="message" id="quote_message" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn primary-btn border-0 w-100" type="submit">Send Quote Request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Prevent typing + and - in quantity input field
        const quantityInput = document.getElementById('quote_quantity');
        if (quantityInput) {
            quantityInput.addEventListener('keydown', function(e) {
                // Prevent + and - keys
                if (e.key === '+' || e.key === '-' || e.key === 'e' || e.key === 'E') {
                    e.preventDefault();
                }
                
                // Prevent typing 0 as the first character (since min is 1)
                if (e.key === '0' && this.value === '') {
                    e.preventDefault();
                }
            });
            
            // Also prevent paste of invalid characters
            quantityInput.addEventListener('paste', function(e) {
                e.preventDefault();
                const paste = (e.clipboardData || window.clipboardData).getData('text');
                const cleanPaste = paste.replace(/[^0-9]/g, '');
                if (cleanPaste && parseInt(cleanPaste) >= 1) {
                    this.value = cleanPaste;
                }
            });
            
            // Validate on input to ensure value is at least 1
            quantityInput.addEventListener('input', function(e) {
                const value = parseInt(this.value);
                if (this.value !== '' && (isNaN(value) || value < 1)) {
                    this.value = '';
                }
            });
        }
    });
</script>

<?php if(session('getaquotemessage')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Close the modal first
        var modalElement = document.getElementById('quoteModal');
        var modal = bootstrap.Modal.getInstance(modalElement);
        if (modal) {
            modal.hide();
        }

        // Show sweet alert
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?php echo e(session("getaquotemessage")); ?>',
            timer: 3000,
            showConfirmButton: false
        });
    });
</script>
<?php endif; ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/website/get-a-quote.blade.php ENDPATH**/ ?>