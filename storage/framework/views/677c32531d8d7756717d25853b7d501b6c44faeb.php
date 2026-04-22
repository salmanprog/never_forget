<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
?>


<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1>Edit Profile</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary btn-sm">Dashboard</a>
        </div>
    </section>
    <style>
        a.password-visibility i {
            position: absolute;
            top: 8px;
            right: 28px;
            font-size: initial;
        }
        .hidden { display: none !important; }
    </style>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if(session('success')): ?>
                    <div class="callout callout-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('member.profile.update')); ?>" id="regform" class="form-horizontal"
                    enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <?php echo csrf_field(); ?>

                    <div class="box box-info">
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">First Name<span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control"
                                        value="<?php echo e($user->name); ?>" name="name" placeholder="Enter First Name">
                                    <span style="color: red"><?php echo e($errors->first('name')); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" name="last_name"
                                        value="<?php echo e($user->last_name); ?>" placeholder="Enter Last Name">
                                    <span style="color: red"><?php echo e($errors->first('last_name')); ?></span>
                                </div>
                            </div>

                            
                            

                            
                            
                            
                            
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Email </label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" readonly
                                        value="<?php echo e($user->email); ?>" placeholder="Enter Email">
                                    <span style="color: red"><?php echo e($errors->first('email')); ?></span>
                                </div>
                            </div>
							<div class="form-group">
                                <label for="" class="col-sm-2 control-label">Phone Number</label>
                                <div class="col-sm-9">
                                    <input type="text" autocomplete="off" class="form-control" name="phone"
                                        value="<?php echo e($user->phone); ?>" placeholder="Enter Phone Number">
                                    <span style="color: red"><?php echo e($errors->first('phone')); ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-9 password-group">
                                    <input type="password" autocomplete="off" class="form-control password-box"
                                        name="password" placeholder="Enter new password">
                                    <a href="#!" class="password-visibility"><i class="fa fa-eye"></i></a>
                                    <span style="color: red"><?php echo e($errors->first('password')); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Confirm Password</label>
                                <div class="col-sm-9 password-group">
                                    <input type="password" autocomplete="off" class="form-control password-box"
                                        name="confirm-password" placeholder="Confirm password">
                                    <a href="#!" class="password-visibility"><i class="fa fa-eye"> </i></a>
                                    <span style="color: red"><?php echo e($errors->first('confirm-password')); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(function() {
            $('.password-group').find('.password-box').each(function(index, input) {
                var $input = $(input);
                $input.parent().find('.password-visibility').click(function() {
                    var change = "";
                    if ($(this).find('i').hasClass('fa-eye')) {
                        $(this).find('i').removeClass('fa-eye')
                        $(this).find('i').addClass('fa-eye-slash')
                        change = "text";
                    } else {
                        $(this).find('i').removeClass('fa-eye-slash')
                        $(this).find('i').addClass('fa-eye')
                        change = "password";
                    }
                    var rep = $("<input type='" + change + "' />")
                        .attr('id', $input.attr('id'))
                        .attr('name', $input.attr('name'))
                        .attr('class', $input.attr('class'))
                        .val($input.val())
                        .insertBefore($input);
                    $input.remove();
                    $input = rep;
                }).insertAfter($input);
            });
        });
    </script>
    <script>
        /* City on load call */
        $(document).ready(function() {
            var city_id = $('#city_id').val();

            $.ajax({
                url: "<?php echo e(route('get_states')); ?>",
                data: {
                    'city_id': city_id
                },
                type: 'GET',
                success: function(response) {
                    var html = '';
                    $.each(response, function(item, val) {
                        html += '<option value="' + val.id + '">' + val.state + '</option>';
                    });
                    $('#state_id').html(html);

                }
            });

        });
        /* Cite on Chnage call */
        $(document).on('change', '#city_id', function() {
            var city_id = $(this).val();
            $.ajax({
                url: "<?php echo e(route('get_states')); ?>",
                data: {
                    'city_id': city_id
                },
                type: 'GET',
                success: function(response) {
                    var html = '';
                    $.each(response, function(item, val) {
                        html += '<option value="' + val.id + '">' + val.state + '</option>';
                    });
                    $('#state_id').html(html);

                }
            });
        });





        $(document).ready(function() {
            if ($(".texteditor").length > 0) {
                tinymce.init({
                    selector: "textarea.texteditor",
                    theme: "modern",
                    height: 150,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                });
            }

            $("#regform").validate({
                rules: {
                    name: "required",
                }
            });

            var imageInput = document.getElementById('image');
            var preview = document.getElementById('profile_picture_preview');
            var placeholder = document.getElementById('profile_picture_placeholder');
            if (imageInput) {
                imageInput.onchange = function(evt) {
                    var file = evt.target.files && evt.target.files[0];
                    if (file) {
                        if (preview) {
                            preview.src = URL.createObjectURL(file);
                            preview.classList.remove('hidden');
                            preview.style.display = 'block';
                        }
                        if (placeholder) placeholder.style.display = 'none';
                    }
                };
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\individual-dashboard\edit.blade.php ENDPATH**/ ?>