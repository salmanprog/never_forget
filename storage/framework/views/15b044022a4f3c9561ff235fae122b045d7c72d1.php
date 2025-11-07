
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('public/assets/website/vendor/aos/aos.css')); ?>" rel="stylesheet">
<style>
    .about-img{
    margin-top: 170px;
    text-align: center;
    height: 420px; /* Fixed height for the image container */
    display: flex;
    align-items: center;
    justify-content: center;
}

.about-img img {
    max-width: 100%;
    height: 710px; /* Fixed height for the image itself */
    border-radius: 30px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    transition: transform 0.4s ease-in-out;
    animation: float 6s ease-in-out infinite; /* Added float animation */
}

.about-img img:hover {
    transform: scale(1.03);
}
.why-choose-content {
    max-width: 430px;
}

@keyframes  float {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
    100% {
        transform: translateY(0px);
    }
}

.inner-page-heading {
    padding: 100px 0;
    text-align: center;
}

.inner-page-heading h1 {
    font-size: 3.8rem;
    font-weight: 700;
    color: #fff;
    text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
    letter-spacing: 2px;
}

.about-section {
    margin-bottom: 0 !important;
    padding: 80px 0;
    background-color: #e0f2ff; /* Light blue background */
}

/* .about-info {
    padding-right: 40px;
} */

.about-info h1 {
    font-size: 2.5rem; /* Adjusted for better fit */
    font-weight: 700; /* Bold as in screenshot */
    color: #081e37;
    margin-bottom: 40px;
    text-align: center;
    position: relative;
    padding-bottom: 15px;
}

.about-info h1::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background-color: #6a9aff; /* Blue accent line like in screenshot */
    border-radius: 2px;
}

#main #faq .card .card-header .btn-header-link {
    color: #fff;
    display: block;
    text-align: left;
    background: #081e37;
    padding: 15px;
    border-radius: 8px 8px 0 0;
    border-left: 1px solid #081e37;
    border-right: 1px solid #081e37;
    border-top: 1px solid #081e37;
    border-bottom: 1px solid #081e37;
}
.card a.btn.btn-header-link {
    font-size: 18px;
    font-family: 'Cocogoose', sans-serif !important;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
}
.card a.btn.btn-header-link:hover {
    background: #cfa40c;
    color: #081e37;
}
#main #faq .card .card-header {
    border: 0;
    border-radius: 5px;
    padding: 0; 
}
#main #faq .card {
    margin-bottom: 20px;
    border: 0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
.card-body {
    background: #efe4c3 !important; /* Lighter shade of gold */
    font-size: 16px;
    line-height: 1.8;
    color:#333;
    padding: 20px;
    border-radius: 0 0 5px 5px;
}
#main #faq .card .card-header .btn-header-link.collapsed:after {
    content: "\f067"; /* Plus icon */
    font-family: 'FontAwesome';
    font-weight: 900;
    float: right;
    transform: rotate(0deg);
    transition: transform 0.3s ease;
}
#main #faq .card .card-header .btn-header-link:after {
    content: "\f068"; /* Minus icon */
    font-family: 'FontAwesome';
    font-weight: 900;
    float: right;
    transform: rotate(180deg);
    transition: transform 0.3s ease;
}
#main #faq .card .collapse.show {
    background: #081e37; /* Darker background for expanded state */
    line-height: 1.8;
    color: #fff;
    border-left: 1px solid #cfa40c;
    border-right: 1px solid #cfa40c;
    border-bottom: 1px solid #cfa40c;
}
#main #faq .card .collapse {
    border: 0;
}

/* New styles for Why Choose Us section */
.why-choose-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 20px;
}

.why-choose-item {
    background-color: #fff;
    border-radius: 15px;
    padding: 25px;
    display: flex;
    align-items: flex-start;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.why-choose-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.why-choose-icon {
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    border-radius: 15px; /* Adjust to match the square-like shape in screenshot */
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 20px;
}

.why-choose-icon i {
    font-size: 30px;
    color: #fff;
}

.why-choose-icon img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 10px; /* Slightly less rounded than the container */
}

/* Icon background colors */
.icon-blue { background-color: #6a9aff; } /* Matches screenshot blue */
.icon-purple { background-color: #a06aff; } /* Matches screenshot purple */
.icon-red { background-color: #ff6a6a; }   /* Matches screenshot red */
.icon-green { background-color: #6aff8f; } /* Matches screenshot green */
.icon-yellow { background-color: #ffd700; } /* New color for the 5th item */


.why-choose-content h3 {
    font-size: 20px;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.why-choose-content p {
    font-size: 15px;
    color: #666;
    line-height: 1.6;
}

/* Adjust about-info h1 for the new title style */
.about-info h1 {
    font-size: 2.5rem; /* Adjusted for better fit */
    font-weight: 700; /* Bold as in screenshot */
    color: #081e37;
    margin-bottom: 40px;
    text-align: center;
    position: relative;
    padding-bottom: 15px;
}

.about-info h1::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: 0;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background-color: #6a9aff; /* Blue accent line like in screenshot */
    border-radius: 2px;
}

/* Adjust about-section background to light blue */
.about-section {
    margin-bottom: 0 !important;
    padding: 80px 0;
    background-color: #e0f2ff; /* Light blue background */
}

</style>
<?php $__env->startSection('title', $page_title); ?>
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Why <span>Choose</span> Us?
            </h1>
        </div>
    </section>
</main>

<section class="about-section" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-start">
            <div id="main" class="col-md-6 mt-5" data-aos="fade-right">
                <div class="about-info mt-5">
                    
                    <div class="why-choose-container">
                        <?php $count = 0; ?>
                        <?php $__currentLoopData = $chooseus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="why-choose-item" data-aos="fade-up" data-aos-delay="<?php echo e($count * 100); ?>">
                            <div class="why-choose-icon">
                                <img src="<?php echo e(asset('public/admin/assets/images/why_choose/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>">
                            </div>
                            <div class="why-choose-content">
                                <h3><?php echo e($item->title); ?></h3>
                                <p><?php echo $item->description; ?></p>
                            </div>
                        </div>
                        <?php $count++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <div class="about-img" data-aos="fade-left">
                    <img src="<?php echo e(asset('public/assets/website/images')); ?>/why-choose.png" alt="Why Choose Us">
                </div>
            </div>
        </div>
    </div>
</section> 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script src="<?php echo e(asset('public/assets/website/vendor/aos/aos.js')); ?>"></script>
<script>
    AOS.init({
        duration: 1000,
        easing: "ease-in-out",
        once: true,
        mirror: false
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never_forget\resources\views/website/why-choose-us.blade.php ENDPATH**/ ?>