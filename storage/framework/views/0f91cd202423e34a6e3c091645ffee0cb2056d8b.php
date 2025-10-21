<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $__env->yieldContent('title'); ?></title>

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="csrf-token" id="token" content="<?php echo e(csrf_token()); ?>" />

		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/bootstrap.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/font-awesome.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/ionicons.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/datepicker3.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/all.css')); ?>">
		<!-- Font Awesome 6 -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/select2.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/dataTables.bootstrap.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/jquery.fancybox.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/AdminLTE.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/_all-skins.min.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/summernote.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/magnific-popup.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/css/toastr.min.css')); ?>">
        <link rel="icon" href="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['header_favicon']); ?>" type="image/png" sizes="16x16">

		<style>
			.skin-blue .wrapper,
			.skin-blue .main-header .logo,
			.skin-blue .main-header .navbar,
			.skin-blue .main-sidebar,
			.content-header .content-header-right a,
			.content .form-horizontal .btn-success {
				background-color: #081e37 !important;
			}

			.content-header .content-header-right a,
			.content .form-horizontal .btn-success {
				border-color: #cfa40c !important;
			}

            .content-header:hover .content-header-right a:hover, .content:hover .form-horizontal:hover .btn-success:hover {
                background-color: #cfa40c !important;
            }

            .info-box-text {
				color: #081e37 !important;
				font-weight: 600;
			}
			
			.info-box:hover {
                display: block;
                min-height: 90px;
                background: #c1c1c1;
                width: 100%;
                box-shadow: 0 1px 1px rgba(0,0,0,0.1);
                border-radius: 2px;
                margin-bottom: 15px;
            }

            a.active {
                background: #cfa40c !important;
            }

            .bg-blue {
                background-color: #cfa40c !important;
            }

            .bg-blue:hover {
                background-color: #081e37 !important;
            }

			.content-header>h1,
			.content-header .content-header-left h1,
			h3 {
				color: #cfa40c !important;
			}

			.box.box-info {
				border-top-color: #cfa40c !important;
			}

			.nav-tabs-custom>.nav-tabs>li.active {
				border-top-color: #f4f4f4 !important;
			}

			.skin-blue .sidebar a {
				color: #fff !important;
			}

			.skin-blue .sidebar-menu>li>.treeview-menu {
				margin: 0 !important;
			}

			.skin-blue .sidebar-menu>li>a {
				border-left: 0 !important;
			}


			.nav-tabs-custom>.nav-tabs>li {
				border-top-width: 1px !important;
			}

			label.error {
				color: #dc3545;
				font-size: 14px;
			}

            .main-sidebar, .left-side {
                top: 0;
                left: 0;
                padding-top: 150px;
                min-height: 100%;
                width: 230px;
                z-index: 810;
                transition: transform .3s ease-in-out,width .3s ease-in-out;
            }

            /* width */
            ::-webkit-scrollbar {
            width: 15px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px rgb(59, 59, 59);
            border-radius: 5px;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: #cfa40c;
            border-radius: 5px;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #081e37;
            }

            h2 {
                font-size: 12px !important;
                margin-top: 5px;
                margin-bottom: 5px;
            }

            .image-slider {
                width: 80px;
                height: 80px;
                overflow: hidden;
                position: relative;
            }

            .slider-image {
                width: 100%;
                height: 100%;
                position: absolute;
                animation: slide 5s linear infinite;
                opacity: 0;
            }
            @keyframes  slide {
                0% {
                    opacity: 0;
                }
                20% {
                    opacity: 1;
                }
                80% {
                    opacity: 1;
                }
                100% {
                    opacity: 0;
                }
            }

			/* Rating stars styling */
			.rating-stars {
				display: inline-flex;
				gap: 2px;
			}
			
			.rating-stars .fas.fa-star {
				color: #ffc107;
			}
			
			.rating-stars .far.fa-star {
				color: #ccc;
			}

			/* Mobile Responsive Dashboard */
			@media (max-width: 768px) {
				.info-box {
					margin-bottom: 15px;
				}
			}

			@media (max-width: 480px) {
				.content-header h1 {
					font-size: 18px !important;
					margin: 10px 0;
				}
				
				.info-box {
					margin-bottom: 10px;
				}
			}
		</style>

		<?php echo $__env->yieldPushContent('css'); ?>
	</head>

	<body class="hold-transition fixed skin-blue sidebar-mini">
		<div class="wrapper">
			<!--header-->
			<?php echo $__env->make('layouts.individual.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<!--sidebar-->
			<?php echo $__env->make('layouts.individual.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			<div class="content-wrapper">
				<?php echo $__env->yieldContent('content'); ?>
			</div>
		</div>
	</body>

	<!-- Script -->
	<script src="<?php echo e(asset('public/admin/assets/js/jquery-2.2.4.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jquery.dataTables.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/dataTables.bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/select2.full.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jscolor.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jquery.inputmask.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jquery.inputmask.date.extensions.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jquery.inputmask.extensions.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/moment.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/bootstrap-datepicker.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/icheck.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/fastclick.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jquery.sparkline.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jquery.slimscroll.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jquery.fancybox.pack.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/app.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/summernote.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jquery.magnific-popup.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/demo.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/tinymce/tinymce.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/jquery.validate.min.js')); ?>"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/toastr.min.js')); ?>"></script>
	<script src="<?php echo e(asset('public/admin/assets/js/search.js')); ?>"></script>
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
    <script>
     $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
     });
    </script>
	<?php echo $__env->yieldPushContent('js'); ?>
</html>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/individual/app.blade.php ENDPATH**/ ?>