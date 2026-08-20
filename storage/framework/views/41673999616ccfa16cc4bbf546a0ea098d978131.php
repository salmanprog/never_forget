<section class="collaborate-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-header">
                    <h3 class="mb-20 heading text-center fs-64" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1000">Our <span>Collaborators</span></h3>
                </div>
                
                <div class="collaborate-images">
                    <div class="swiper logo-swapper">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $collaborators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collaborator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <?php if(!empty($collaborator->slug)): ?>
                                    <a href="<?php echo e(route('collaborators.show', $collaborator->slug)); ?>" title="<?php echo e($collaborator->title); ?>">
                                        <img src="<?php echo e($collaborator->image_url); ?>" alt="<?php echo e($collaborator->title); ?>">
                                    </a>
                                <?php else: ?>
                                    <img src="<?php echo e($collaborator->image_url); ?>" alt="<?php echo e($collaborator->title); ?>">
                                <?php endif; ?>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH D:\xamp-new\htdocs\neverforget-updated\resources\views/website/include/collaborate.blade.php ENDPATH**/ ?>