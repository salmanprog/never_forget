<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Never Forget</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/ionicons.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/datepicker3.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/all.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/select2.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/dataTables.bootstrap.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/AdminLTE.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/_all-skins.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/toastr.min.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['header_favicon']); ?>" type="image/png" sizes="16x16">

	<style>
		/* Style the form container */
        .login-box-body {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #83bdedb0;
            border-radius: 10px;
            box-shadow: 0px 0px 50px rgb(0 0 0);
        }

        /* Style the animated input fields */
        .animated-input {
            position: relative;
            margin-bottom: 20px;
            font-size: 16px;
            color: black;
        }

        .animated-label {
            position: absolute;
            top: 12px;
            left: 10px;
            color: #333;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .animated-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .animated-field:focus {
            outline: none;
            border-color: #006166;
        }

        /* Animate the label when input is focused or has content */
        .animated-field:focus + .animated-label,
        .animated-field:not(:placeholder-shown) + .animated-label {
            top: -10px;
            font-size: 12px;
            color: #006166;
        }

        /* Style the error messages */
        .animated-error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        /* Style the remember me checkbox */
        .animated-checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .animated-check-input {
            margin-right: 10px;
        }

        .animated-check-label {
            color: #333;
            margin-bottom: -5px !important;
            margin-left: 5px !important;
        }

        /* Style the submit button */
        .animated-button-container {
            text-align: center;
        }

        .animated-button {
            background-color: #cfa40c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .animated-button:hover {
            background-color: #0a2749;
        }

        /* Style the forgot password link */
        .animated-link {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #333;
            margin-top: 10px;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            .login-box-body {
                max-width: 100%;
            }
        }
	</style>

</head>

<body class="hold-transition login-page sidebar-mini" style="background-image: url('<?php echo e(asset('public/assets/website/images/gift-login4.avif')); ?>')">

<?php echo $__env->yieldContent('content'); ?>

<script src="<?php echo e(asset('public/admin/assets/js/jquery-2.2.3.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.inputmask.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.inputmask.date.extensions.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.inputmask.extensions.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/icheck.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/fastclick.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/app.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/demo.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/assets/js/toastr.min.js')); ?>"></script>
<script>
    <?php if(Session::has('message')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("<?php echo e(session('message')); ?>");
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>

    <?php if(Session::has('info')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("<?php echo e(session('info')); ?>");
    <?php endif; ?>

    <?php if(Session::has('warning')): ?>
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("<?php echo e(session('warning')); ?>");
    <?php endif; ?>
</script>
</body>
</html>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/auth/admin/layouts/app.blade.php ENDPATH**/ ?>