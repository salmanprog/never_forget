<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', $page_title); ?>
<style>
    .cart-main {
        padding: 30px 0;
    }
    .input-field {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #ddd;
        border-radius: 6px;
        margin-bottom: 0;
    }
    .input-field:focus {
        border-color: #0a2749;
        outline: none;
    }
    .form-group-ecard {
        margin-bottom: 20px;
    }
    .form-group-ecard label {
        display: block;
        font-weight: 600;
        color: #0a2749;
        margin-bottom: 8px;
    }
    .golbal-btn-submit {
        background: #cfa40c;
        color: #fff;
        border: none;
        padding: 12px 32px;
        font-size: 17px;
        border-radius: 6px;
        transition: background 0.2s;
    }
    .golbal-btn-submit:hover {
        background: #0a2749;
        color: #fff;
    }
    #physical-gift-dropdown {
        display: none;
        margin-top: 12px;
    }
    .ecard-radio-group {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background: #fff;
    }
    .ecard-radio-group .ecard-radio-option {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        margin: 0;
        font-weight: 500;
        color: #333;
    }
    .ecard-radio-group .ecard-radio-option input {
        width: 18px;
        height: 18px;
        accent-color: #0a2749;
        cursor: pointer;
    }
    .ecard-radio-group .ecard-radio-option input:checked + span {
        color: #0a2749;
        font-weight: 600;
    }
    .ecard-image-preview {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #ddd;
        border-radius: 6px;
        margin-top: 8px;
        background: #fff;
        min-height: 80px;
        display: none;
    }
    .ecard-image-preview img {
        max-width: 100%;
        max-height: 200px;
        object-fit: contain;
    }
    .ecard-file-wrap {
        position: relative;
        width: 100%;
    }
    .ecard-file-wrap input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
        z-index: 1;
    }
    .ecard-file-fake {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background: #fff;
        color: #333;
        cursor: pointer;
        pointer-events: none;
    }
    .ecard-file-fake.placeholder {
        color: #999;
    }
</style>
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Create E Card
            </h1>
        </div>
    </section>
</main>
<section class="cart-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(route('store-e-card')); ?>" method="POST" enctype="multipart/form-data" class="e-card-form" id="e-card-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="e_card_category_id" value="<?php echo e($eCardCategory->id); ?>">
                    <div class="row">
                        <div class="col-lg-6 form-group-ecard">
                            <label for="occasion">Occasion <span style="color: red">*</span></label>
                            <select name="occasion" id="occasion" class="input-field" required>
                                <option value="">Select Occasion</option>
                                <option value="Birthday">Birthday</option>
                                <option value="Anniversary">Anniversary</option>
                                <option value="Thank You">Thank You</option>
                                <option value="Congratulations">Congratulations</option>
                                <option value="Holiday">Holiday</option>
                                <option value="Get Well">Get Well</option>
                                <option value="Sympathy">Sympathy</option>
                                <option value="Just Because">Just Because</option>
                                <option value="Custom">Custom</option>
                            </select>
                        </div>
                        <div class="col-lg-6 form-group-ecard">
                            <label for="recipient_name">Recipient Name <span style="color: red">*</span></label>
                            <input type="text" name="recipient_name" id="recipient_name" class="input-field" placeholder="Recipient Name" required>
                        </div>
                        <div class="col-lg-12 form-group-ecard">
                            <label for="recipient_email_phone">Recipient Email or Phone Number <span style="color: red">*</span></label>
                            <input type="text" name="recipient_email_phone" id="recipient_email_phone" class="input-field" placeholder="Email or Phone Number" required>
                        </div>
                        <div class="col-12 form-group-ecard">
                            <label for="message">Message to Include on the Card</label>
                            <textarea name="message" id="message" class="input-field" rows="4" placeholder="Message to Include on the Card"></textarea>
                        </div>
                        <div class="col-lg-12 form-group-ecard">
                            <label for="card_style">Preferred Card Style</label>
                            <select name="card_style" id="card_style" class="input-field">
                                <option value="">Select Card Style</option>
                                <option value="Elegant">Elegant</option>
                                <option value="Professional">Professional</option>
                                <option value="Fun">Fun</option>
                                <option value="Modern">Modern</option>
                                <option value="Holiday">Holiday</option>
                                <option value="Upload Your Own">Upload Your Own</option>
                            </select>
                        </div>
                        <div class="col-lg-12 form-group-ecard">
                            <label for="upload_logo_photo">Upload Logo or Photo (optional)</label>
                            <div class="ecard-file-wrap">
                                <input type="file" name="upload_logo_photo" id="upload_logo_photo" accept="image/*">
                                <div id="ecard-file-fake" class="ecard-file-fake placeholder">Choose image...</div>
                            </div>
                            <div id="ecard-image-preview" class="ecard-image-preview"></div>
                        </div>
                        <div class="col-lg-12 form-group-ecard">
                            <label for="send_date">Send Date & Time <span style="color: red">*</span></label>
                            <div class="d-flex gap-2 flex-wrap">
                                <input type="date" name="send_date" id="send_date" class="input-field" required min="<?php echo e(date('Y-m-d')); ?>" style="flex: 1; min-width: 140px;">
                                <input type="time" name="send_time" id="send_time" class="input-field" required style="flex: 1; min-width: 120px;">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group-ecard">
                            <label>Add a Physical Gift?</label>
                            <div class="ecard-radio-group">
                                <label class="ecard-radio-option">
                                    <input type="radio" name="physical_gift" value="Yes" class="physical-gift-radio">
                                    <span>Yes</span>
                                </label>
                                <label class="ecard-radio-option">
                                    <input type="radio" name="physical_gift" value="No" class="physical-gift-radio" checked>
                                    <span>No</span>
                                </label>
                            </div>
                            <div id="physical-gift-dropdown">
                                <select name="physical_gift_type" id="physical_gift_type" class="input-field">
                                    <option value="">Select Gift Type</option>
                                    <option value="Flowers">Flowers</option>
                                    <option value="Cakes">Cakes</option>
                                    <option value="Chocolates">Chocolates</option>
                                    <option value="Cookies">Cookies</option>
                                    <option value="Gift Baskets">Gift Baskets</option>
                                </select>
                            </div>
                        </div>
                        <?php if(!Auth::check()): ?>
                        <h2 class="mb-20">Login or Provide Your Details</h2>
                        <div class="col-lg-6 form-group-ecard">
                            <label for="sender_name">Your Name (Sender) <span style="color: red">*</span></label>
                            <input type="text" name="sender_name" id="sender_name" class="input-field" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-6 form-group-ecard">
                            <label for="sender_email">Your Email <span style="color: red">*</span></label>
                            <input type="email" name="sender_email" id="sender_email" class="input-field" placeholder="Your Email" required>
                        </div>
                        <div class="col-lg-6 form-group-ecard">
                            <label for="sender_phone">Your Phone Number (optional)</label>
                            <input type="text" name="sender_phone" id="sender_phone" class="input-field" placeholder="Your Phone Number">
                        </div>
                        <div class="col-lg-6 form-group-ecard">
                            <label for="company_name">Company Name (optional)</label>
                            <input type="text" name="company_name" id="company_name" class="input-field" placeholder="Company Name">
                        </div>
                        <?php endif; ?>
                        <div class="col-12 form-group-ecard">
                            <button type="submit" class="golbal-btn-submit" id="ecard-submit-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function() {
        $('.physical-gift-radio').on('change', function() {
            if ($(this).val() === 'Yes') {
                $('#physical-gift-dropdown').show();
            } else {
                $('#physical-gift-dropdown').hide();
            }
        });
        $('#upload_logo_photo').on('change', function() {
            var file = this.files[0];
            var preview = $('#ecard-image-preview');
            var fake = $('#ecard-file-fake');
            preview.hide().empty();
            if (file) {
                fake.removeClass('placeholder').text(file.name);
                if (file.type.indexOf('image') === 0) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        preview.html('<img src="' + e.target.result + '" alt="Preview">').show();
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                fake.addClass('placeholder').text('Choose image...');
            }
        });

        $('#e-card-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this)[0];
            var formData = new FormData(form);
            var btn = $('#ecard-submit-btn');
            btn.prop('disabled', true).text('Submitting...');
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    btn.prop('disabled', true).text('Submitting...');
                },
                success: function(response) {
                    btn.prop('disabled', false).text('Submit');
                    Swal.fire({
                        icon: 'success',
                        title: 'Thank You!',
                        text: response.message || 'Your E-Card enquiry has been submitted successfully.',
                        confirmButtonColor: '#0a2749'
                    });
                    $('#e-card-form')[0].reset();
                    $('#physical-gift-dropdown').hide();
                    $('#ecard-image-preview').hide().empty();
                    $('#ecard-file-fake').addClass('placeholder').text('Choose image...');
                },
                complete: function() {
                    btn.prop('disabled', false).text('Submit');
                },
                error: function(xhr) {
                    btn.prop('disabled', false).text('Submit');
                    var msg = 'Something went wrong. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var err = xhr.responseJSON.errors;
                        msg = Object.values(err).flat().join(' ');
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: msg,
                        confirmButtonColor: '#0a2749'
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\create-e-card.blade.php ENDPATH**/ ?>