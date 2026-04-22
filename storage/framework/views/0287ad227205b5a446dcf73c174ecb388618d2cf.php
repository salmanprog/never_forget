<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['header_favicon']); ?>" type="image/png" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="<?php echo e(asset('public/assets')); ?>/website/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets')); ?>/website/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'against';
            font-style: normal;
            font-weight: 400;
            src: local('against'), url('https://fonts.cdnfonts.com/s/72739/AgainstRegular-Wy5pv.woff') format('woff');
        }
    </style>
    <!-- font family  -->
    <!-- FontAwsome Cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FontAwsome Cdn  -->

    <!-- custom css  -->
    
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/website')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/website')); ?>/css/responsive.css">
    
    <?php echo $__env->yieldContent('css'); ?>
    <?php echo $__env->yieldPushContent('css'); ?>

</head>

    

<body>
    <!-- Header -->
    <?php echo $__env->make('layouts.website.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Header End -->

    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer -->
    <?php echo $__env->make('layouts.website.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Footer End -->






 <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Custom JavaScript or jQuery  -->
    <script>
        $(document).ready(function () {
            $('.nav-button').click(function () {
                $('body').toggleClass('nav-open');
            });
        });

    </script>
       <script>
        $(document).ready(function () {
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>
    <!-- data table js  -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
<script>
    $(document).on('click', '.navigatee ul li', function() {
        $(this).addClass('selected').siblings().removeClass('selected');
    });
      $(document).on('click', '.subscriber-btn', function(){
            var email = $('.subscriber_email').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "<?php echo e(route('newsletter.store')); ?>",
                data : {'email' : email},
                type : 'POST',
                success : function(response){
                    console.log(response);
                    if(response==3){
                        Swal.fire(
                          'Alert!',
                          'Enter email.',
                          'warning',
                        )
                    }else if(response==2){
                        Swal.fire(
                          'Alert!',
                          'This is already subsribed.',
                          'warning',
                        )
                    }else{
                        $('.subscriber_email').val('');
                        Swal.fire(
                          'Congratulations!',
                          'You have subscribed successfully.',
                          'success',
                        )
                    }
                }
            });
        });
</script>
<script>
    AOS.init();
  </script>
  <script>
    var btn = $('#topbutton');

    $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
    });

    btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
    });
  </script>
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



<?php echo $__env->yieldContent('footer_scripts'); ?>

</body>
</html>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\auth\layouts\app.blade.php ENDPATH**/ ?>